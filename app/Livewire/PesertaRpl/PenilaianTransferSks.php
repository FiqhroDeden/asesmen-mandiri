<?php

namespace App\Livewire\PesertaRpl;

use App\Models\Matakuliah;
use Livewire\Component;
use App\Models\Peserta;
use Livewire\Attributes\On;
use App\Models\NilaiTransferSks;
use Livewire\Attributes\Validate;
use App\Models\FormulirAplikasiRpl;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\PenilaianTransferSksForm;
use Illuminate\Support\Facades\DB;

class PenilaianTransferSks extends Component
{
    public $show = false;
    public $matakuliah_id;
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
    public $kurikulum;

    #[Validate('required|string')]
    public $nilai;
    public $is_lulus;
    public $gradeMapping = [];

    public function updatedNilai($value)
    {
        $this->nilai = strtoupper($value);
    }
    #[On("nilaiTransferSks")]
    public function nilaiTransferSks(FormulirAplikasiRpl $evaluasi)
    {
        $this->matakuliah_id = $evaluasi->matakuliah_id;
        $this->kurikulum = $evaluasi->matakuliah->tahun_berlaku;
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

        DB::beginTransaction();
        try {
            $matakuliah = Matakuliah::findOrFail($this->matakuliah_id);
            if($matakuliah->tahun_berlaku == '2018' || $matakuliah->tahun_berlaku == '2019' || $matakuliah->tahun_berlaku == '2020')
            {
                $this->gradeMapping = [
                    'A'  => 8,
                    'A-' => 7,
                    'B+' => 6,
                    'B'  => 5,
                    'B-' => 4,
                    'C'  => 3,
                    'D'  => 2,
                    'E'  => 1,
                    '-'  => 0,
                ];
            }else{
                $this->gradeMapping = [
                    'A' => 5,
                    'B' => 4,
                    'C' => 3,
                    'D' => 2,
                    'E' => 1,
                    '-' => 0,
                ];
            }

            if(isset($this->gradeMapping[$this->nilai])){
                if($this->gradeMapping[$this->nilai] >= $this->gradeMapping[$matakuliah->nilai_huruf_min_lulus]){
                    $this->is_lulus = true;
                }else{
                    $this->is_lulus = false;
                }
            }else{
                $this->closeModal();
                $this->reset();
                return flash()->error('Harap Memilih nilai dengan benar');

            }
            NilaiTransferSks::updateOrCreate(
                ['transfer_sks_id' => $this->id_transfer_sks],
                [
                    'user_id' => Auth::user()->id,
                    'nilai' => $this->nilai,
                    'keterangan' => $this->keterangan,
                    'is_lulus' => $this->is_lulus
                ],
            );
            DB::commit();
            $this->reset();
            $this->closeModal();
            flash()->success('Nilai berhasil disimpan');
            $this->dispatch('reload');
        } catch(\Exception $e) {
            $this->reset();
            $this->closeModal();
            flash()->error('Terjadi Kesalahan Coba Lagi, Coba lagi atau hubungi pusdatin.');
            $this->dispatch('reload');
        }

    }

    public function closeModal(){
        $this->show = false;
    }    public function render()
    {
        return view('livewire.peserta-rpl.penilaian-transfer-sks');
    }
}
