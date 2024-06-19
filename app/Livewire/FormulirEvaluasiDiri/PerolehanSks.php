<?php

namespace App\Livewire\FormulirEvaluasiDiri;

use App\Models\BuktiPerolehanSks;
use Livewire\Component;
use App\Models\Matakuliah;
use Livewire\Attributes\On;
use App\Models\PerolehanSks as PerolehanSksModel;
use App\Models\BuktiPendukung;
use App\Models\CapaianPembelajaran;
use App\Models\FormulirAplikasiRpl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerolehanSks extends Component
{
    public $show = false;

    public $no = 1;
    public $matakuliah_id;
    public $form = [];

    public $evaluasi_id;
    #[On("makePerolehanSks")]
    public function makePerolehanSks(FormulirAplikasiRpl $evaluasi)
{
    $this->matakuliah_id = $evaluasi->matakuliah_id;
    $this->evaluasi_id = $evaluasi->id;
    $this->show = true;

    $dataCpmk = CapaianPembelajaran::where('matakuliah_id', $evaluasi->matakuliah_id)->get();
    $perolehanSks = PerolehanSksModel::where('formulir_aplikasi_rpl_id', $evaluasi->id)->get()->keyBy('cpm_id');

    foreach ($dataCpmk as $cpmk) {
        $this->form[$cpmk->id] = [
            'status_ketrampilan' => $perolehanSks->has($cpmk->id) ? $perolehanSks[$cpmk->id]->status_ketrampilan : 'TP',
            'bukti_pendukung' => $perolehanSks->has($cpmk->id) ? $perolehanSks[$cpmk->id]->buktiPerolehanSks->pluck('bukti_pendukung_id')->toArray() : [], // Load bukti_pendukung if available
        ];
    }

    // dd($this->form);
}



public function simpan()
{

    // Validate the form data
    $this->validate([
        'form.*.status_ketrampilan' => 'required',
        'form.*.bukti_pendukung' => 'required_if:form.*.status_ketrampilan,SB,B'
    ]);

    DB::beginTransaction();

    try {
        // Retrieve existing PerolehanSks records and key them by 'cpm_id'
        $existingPerolehanSks = PerolehanSksModel::where('formulir_aplikasi_rpl_id', $this->evaluasi_id)
            ->get()
            ->keyBy('cpm_id');

        foreach ($this->form as $cpmId => $form) {
            $perolehanSks = $existingPerolehanSks->get($cpmId);

                if ($perolehanSks) {
                    // Update existing PerolehanSks record
                    $perolehanSks->update(['status_ketrampilan' => $form['status_ketrampilan']]);
                } else {
                    // Create new PerolehanSks record
                    $perolehanSks = PerolehanSksModel::create([
                        'formulir_aplikasi_rpl_id' => $this->evaluasi_id,
                        'cpm_id' => $cpmId,
                        'status_ketrampilan' => $form['status_ketrampilan'],
                    ]);
                }

                $existingBuktiPerolehanSks = BuktiPerolehanSks::where('perolehan_sks_id', $perolehanSks->id)
                    ->get()
                    ->keyBy('bukti_pendukung_id');

                // Add new BuktiPerolehanSks or retain existing ones
                foreach ($form['bukti_pendukung'] as $buktiPendukungId) {
                    if (!$existingBuktiPerolehanSks->has($buktiPendukungId)) {
                        BuktiPerolehanSks::create([
                            'perolehan_sks_id' => $perolehanSks->id,
                            'bukti_pendukung_id' => $buktiPendukungId,
                        ]);
                    } else {
                        $existingBuktiPerolehanSks->forget($buktiPendukungId);
                    }
                }

                // Remove unselected bukti_pendukung
                BuktiPerolehanSks::where('perolehan_sks_id', $perolehanSks->id)
                    ->whereIn('bukti_pendukung_id', $existingBuktiPerolehanSks->keys())
                    ->delete();
            if ($form['status_ketrampilan'] == 'TP') {
                if(isset($existingPerolehanSks[$cpmId])){
                    // $existingPerolehanSks[$cpmId]->delete();
                    // Delete associated BuktiPerolehanSks records
                    BuktiPerolehanSks::where('perolehan_sks_id', $existingPerolehanSks[$cpmId]->id)->delete();

                }
            }
        }

        DB::commit();
        flash()->success('Berhasil mengajukan perolehan SKS');
        $this->closeModal();
        $this->dispatch('reload');
    } catch (\Exception $e) {
        DB::rollback();
        $this->closeModal();
        flash()->error('Terjadi Kesalahan Sistem, Silahkan coba lagi nanti. Hubungi admin. Error: ' . $e->getMessage());
    }
}



    public function closeModal()
    {
        $this->show = false;
        $this->reset();
        $this->resetValidation();

    }
    public function render()
    {
        return view('livewire.formulir-evaluasi-diri.perolehan-sks', [
            'dataCpmk' => CapaianPembelajaran::where('matakuliah_id', $this->matakuliah_id)->get(),
            'dataBukti' => BuktiPendukung::where('no_peserta', Auth::user()->no_peserta)->get()
        ]);
    }
}
