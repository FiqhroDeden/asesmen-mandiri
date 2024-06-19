<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\TransferSks;
use App\Models\BuktiTransferSks;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use App\Models\FormulirAplikasiRpl;

class TransferSksForm extends Form
{
    #[Locked]
    public $formulir_aplikasi_rpl_id;
    public $nama_matakuliah_asal;
    public $sks_matakuliah_asal;
    public $nilai_matakuliah_asal;
    public $bukti_pendukung = [];

    public ?FormulirAplikasiRpl $evaluasi;

    public function setForm(FormulirAplikasiRpl $evaluasi)
    {
        $this->formulir_aplikasi_rpl_id = $evaluasi->id;

        if ($transferSks = $evaluasi->transferSks) {
            $this->nama_matakuliah_asal = $transferSks->nama_matakuliah_asal;
            $this->sks_matakuliah_asal = $transferSks->sks_matakuliah_asal;
            $this->nilai_matakuliah_asal = $transferSks->nilai_matakuliah_asal;
            $this->bukti_pendukung = $transferSks->buktiTransferSks->pluck('bukti_pendukung_id')->toArray();
        }else{
            $this->bukti_pendukung = [];
        }
    }


    public function store()
    {
        $this->validate([
            'formulir_aplikasi_rpl_id' => 'required',
            'nama_matakuliah_asal' => 'required|string',
            'sks_matakuliah_asal' => 'required|numeric',
            'nilai_matakuliah_asal' => 'required|string',
            'bukti_pendukung' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            // Update or create the TransferSks record
            $transferSks = TransferSks::updateOrCreate(
                ['formulir_aplikasi_rpl_id' => $this->formulir_aplikasi_rpl_id],
                [
                    'nama_matakuliah_asal' => $this->nama_matakuliah_asal,
                    'sks_matakuliah_asal' => $this->sks_matakuliah_asal,
                    'nilai_matakuliah_asal' => $this->nilai_matakuliah_asal,
                ]
            );

            // Retrieve the id of the newly created or updated TransferSks
            $transferSksId = $transferSks->id;

            // Get existing BuktiEvaluasi records for the given evaluasi_id
            $existingBuktiTransferSks = BuktiTransferSks::where('transfer_sks_id', $transferSksId)
                ->get()
                ->keyBy('bukti_pendukung_id');

            // Handle addition of new bukti_pendukung
            foreach ($this->bukti_pendukung as $buktiPendukungId) {
                if (!isset($existingBuktiTransferSks[$buktiPendukungId])) {
                    BuktiTransferSks::create([
                        'transfer_sks_id' => $transferSksId,
                        'bukti_pendukung_id' => $buktiPendukungId,
                    ]);
                } else {
                    // Remove from the array so it won't be deleted later
                    unset($existingBuktiTransferSks[$buktiPendukungId]);
                }
            }

            // Remove unselected bukti_pendukung
            BuktiTransferSks::where('transfer_sks_id', $transferSksId)
                ->whereIn('bukti_pendukung_id', $existingBuktiTransferSks->keys())
                ->delete();

            DB::commit();
            $this->reset();
            flash()->success('Berhasil Menyimpan Transfer SKS');
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Terjadi Kesalahan Sistem, Silahkan coba lagi nanti. Hubungi admin, ' . $e->getMessage());
        }
    }

}
