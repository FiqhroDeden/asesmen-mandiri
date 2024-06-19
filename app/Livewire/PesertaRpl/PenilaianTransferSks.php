<?php

namespace App\Livewire\PesertaRpl;

use Livewire\Component;
use App\Models\Peserta;
use Livewire\Attributes\On;
use App\Models\NilaiTransferSks;
use Livewire\Attributes\Validate;
use App\Models\FormulirAplikasiRpl;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\PenilaianTransferSksForm;

class PenilaianTransferSks extends Component
{
    public $show = false;
    public $matakuliah_konversi;
    public $nama_matakuliah_asal;
    public $sks_matakuliah_asal;
    public $nilai_matakuliah_asal;
    public $nama_bukti_pendukung;
    public $file_bukti_pendukung;
    public $id_transfer_sks;
    public $bukti_pendukung = [];
    public $keterangan;
    public $is_permanen;

    #[Validate('required|string')]
    public $nilai;
    #[On("nilaiTransferSks")]
    public function nilaiTransferSks(FormulirAplikasiRpl $evaluasi)
    {
        $peserta = Peserta::where('no_peserta', $evaluasi->no_peserta)->first();
        $this->is_permanen = $peserta->is_permanen;
        $this->id_transfer_sks = $evaluasi->transferSks->id;
        if($evaluasi->transferSks->nilaiTransferSks){
            $this->nilai = $evaluasi->transferSks->nilaiTransferSks->nilai;
            $this->keterangan = $evaluasi->transferSks->nilaiTransferSks->keterangan;
        }
        $this->matakuliah_konversi = $evaluasi->matakuliah->nama;
        $this->nama_matakuliah_asal = $evaluasi->transferSks->nama_matakuliah_asal;
        $this->sks_matakuliah_asal = $evaluasi->transferSks->sks_matakuliah_asal;
        $this->nilai_matakuliah_asal = $evaluasi->transferSks->nilai_matakuliah_asal;
        $this->bukti_pendukung = $evaluasi->transferSks->buktiTransferSks;
        $this->show = true;
    }


    public function simpan(){
        NilaiTransferSks::updateOrCreate(
            ['transfer_sks_id' => $this->id_transfer_sks],
            [
                'user_id' => Auth::user()->id,
                'nilai' => $this->nilai,
                'keterangan' => $this->keterangan
            ],
        );

        $this->reset();
        $this->closeModal();
        flash()->success('Nilai berhasil disimpan');
        $this->dispatch('reload');
    }

    public function closeModal(){
        $this->show = false;
    }    public function render()
    {
        return view('livewire.peserta-rpl.penilaian-transfer-sks');
    }
}
