<?php

namespace App\Livewire\PesertaRpl;

use App\Models\Peserta;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\PerolehanSks;
use App\Models\NilaiPerolehanSks;
use Illuminate\Support\Facades\DB;
use App\Models\FormulirAplikasiRpl;
use Illuminate\Support\Facades\Auth;

class PenilaianPerolehanSks extends Component
{
    public $no  = 1;
    public $show = false;
    public $nama_matakuliah;
    public $uraian_matakuliah;
    public $evaluasi_id;
    public $form = [];
    public $nilai ;
    public $skor ;
    public $is_permanen;

    #[On('nilaiPerolehanrSks')]
    public function nilaiPerolehanrSks(FormulirAplikasiRpl $evaluasi)
    {
        $peserta = Peserta::where('no_peserta', $evaluasi->no_peserta)->first();
        $this->is_permanen = $peserta->is_permanen;
        $this->evaluasi_id = $evaluasi->id;
        $this->nama_matakuliah = $evaluasi->matakuliah->nama;
        $this->uraian_matakuliah = $evaluasi->matakuliah->uraian;
        $dataPerolehanSks = PerolehanSks::where('formulir_aplikasi_rpl_id', $this->evaluasi_id)->get();
        foreach ($dataPerolehanSks as $key => $perolehanSks) {
            $this->form[$perolehanSks->id] = [
                'status_ketrampilan'    => $perolehanSks->status_ketrampilan,
                'is_valid' => $perolehanSks->is_valid ? true : false,
                'is_autentik'   => $perolehanSks->is_autentik ? true : false,
                'is_terkini'   => $perolehanSks->is_terkini ? true : false,
                'is_memadai'   => $perolehanSks->is_memadai ? true : false,
                'bukti_pendukung'   => $perolehanSks->buktiPerolehanSks
            ];
        }
        // dd($this->form);
        $this->show = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->show = false;
    }
    private function calculateNilai($dataPerolehanSks)
    {
        $maxPointsPerEntry = 3 + 4; // 3 points for status_ketrampilan (SB) + 4 points for the criteria
        $totalPoints = 0;
        $totalEntries = count($dataPerolehanSks);

        foreach ($dataPerolehanSks as $perolehanSks) {
            $entryPoints = 0;

            // Add points for status_ketrampilan
            switch ($perolehanSks->status_ketrampilan) {
                case 'SB':
                    $entryPoints += 3;
                    break;
                case 'B':
                    $entryPoints += 2;
                    break;
                case 'TP':
                    $entryPoints += 1;
                    break;
            }

            // Add points for criteria
            if ($perolehanSks->is_valid) {
                $entryPoints += 1;
            }
            if ($perolehanSks->is_autentik) {
                $entryPoints += 1;
            }
            if ($perolehanSks->is_terkini) {
                $entryPoints += 1;
            }
            if ($perolehanSks->is_memadai) {
                $entryPoints += 1;
            }

        $totalPoints += $entryPoints;
    }

    $maxTotalPoints = $totalEntries * $maxPointsPerEntry;
    $percentage = ($totalPoints / $maxTotalPoints) * 100;

    if ($percentage >= 80) {
        $nilai = 'A';
    } elseif ($percentage >= 70) {
        $nilai = 'B';
    } elseif ($percentage >= 60) {
        $nilai = 'C';
    } elseif ($percentage >= 50) {
        $nilai = 'D';
    } else {
        $nilai = 'E';
    }

    return ['nilai' => $nilai, 'skor' => $percentage];
}





    public function simpan()
    {
        // dd($this->form);
        $dataPerolehanSks = PerolehanSks::where('formulir_aplikasi_rpl_id', $this->evaluasi_id)->get();
        // dd($this->form);
        DB::beginTransaction();
        try {
            foreach ($dataPerolehanSks as $perolehanSks) {
                $perolehanSks->status_ketrampilan = $this->form[$perolehanSks->id]['status_ketrampilan'];
                if($this->form[$perolehanSks->id]['status_ketrampilan'] == 'TP'){
                    $perolehanSks->is_valid = 0;
                    $perolehanSks->is_autentik = 0;
                    $perolehanSks->is_terkini = 0;
                    $perolehanSks->is_memadai = 0;
                }else{
                    $perolehanSks->is_valid = $this->form[$perolehanSks->id]['is_valid'];
                    $perolehanSks->is_autentik = $this->form[$perolehanSks->id]['is_autentik'];
                    $perolehanSks->is_terkini = $this->form[$perolehanSks->id]['is_terkini'];
                    $perolehanSks->is_memadai = $this->form[$perolehanSks->id]['is_memadai'];
                }

                // Save the record
                $perolehanSks->update();
            }
             // Calculate the grade (nilai)
            $result = $this->calculateNilai($dataPerolehanSks);
            $this->nilai = $result['nilai'];
            $this->skor = $result['skor'];

            NilaiPerolehanSks::updateOrCreate(
                ['formulir_aplikasi_rpl_id' => $this->evaluasi_id],
                [
                    'user_id' => Auth::user()->id,
                    'nilai' => $this->nilai,
                    'skor'  => $this->skor,
                ],
            );
            DB::commit();
            flash()->success('Nilai Perolehan SKS Berhasil Simpan');
            $this->closeModal();
            $this->dispatch('reload');
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Terjadi Kesalahan Sistem, Harap menghungi Akademik, '. $e->getMessage());
            $this->closeModal();
        }



    }

    public function render()
    {
        $dataPerolehanSks = PerolehanSks::where('formulir_aplikasi_rpl_id', $this->evaluasi_id)->get();
        return view('livewire.peserta-rpl.penilaian-perolehan-sks', compact('dataPerolehanSks'));
    }
}
