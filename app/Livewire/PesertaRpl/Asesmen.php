<?php

namespace App\Livewire\PesertaRpl;

use App\Models\Peserta;
use Livewire\Component;
use App\Models\Matakuliah;
use App\Models\TransferSks;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Models\NilaiTransferSks;
use App\Models\BeritaAcaraAsesmen;
use Illuminate\Support\Facades\DB;
use App\Models\FormulirAplikasiRpl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class Asesmen extends Component
{
    use WithFileUploads;
    #[Title('Proses Asesmen')]
    public $no_peserta;
    public $no = 1;
    public $is_permanen;
    public $can_permanen = false;
    public $is_form3_uploaded;
    public $isUploaded = false;
    public $file;

    protected $listeners = [
        'reload'    => '$refresh'
    ];

    public function mount($no_peserta)
    {
        $peserta = Peserta::where('no_peserta', $no_peserta)->first();
        $transferSksValid = false; // Initialize as false
        $perolehanSksValid = false; // Initialize as false

        foreach ($peserta->formulirAplikasiRpl as $formulir) {
            if ($formulir->keterangan == 'transfer-sks') {
                if ($formulir->transferSks) {
                    if($formulir->transferSks->nilaiTransferSks){
                        $transferSksValid = true;
                    }else{
                        $transferSksValid = false;
                        break;
                    }
                } else {
                    $transferSksValid = false;
                    break; // If any transferSks is null, can_permanen should be false
                }
            } elseif ($formulir->keterangan == 'perolehan-sks') {
                if ($formulir->perolehanSks->count() > 0) {
                    if($formulir->nilaiPerolehanSks){

                        $perolehanSksValid = true;
                    }else{
                        break; // If any perolehanSks has no data, can_permanen should be false
                    }
                } else {
                    $perolehanSksValid = false;
                    break; // If any perolehanSks has no data, can_permanen should be false
                }
            }
        }

        // Set can_permanen to true only if both conditions are valid
        if ($transferSksValid && $perolehanSksValid) {
            $this->can_permanen = true;
        }

        $this->is_form3_uploaded = $peserta->file_form3;
        $this->no_peserta = $no_peserta;
        $this->is_permanen = $peserta->is_permanen;
        if($peserta->beritaAcara && $peserta->beritaAcara->file){
            $this->isUploaded = true;
        }
    }


    public function uploadFile()
    {
        DB::beginTransaction();
        try {
            $beritaAcara = BeritaAcaraAsesmen::where('no_peserta', $this->no_peserta)->first();
            $beritaAcara->file = $this->file->store(path: 'public/berita-acara');
            $beritaAcara->save();

            DB::commit();
            flash()->success('Berita Acara Berhasil Di upload');
            $this->reset('file');
            $this->isUploaded = true;
            $this->dispatch('reload');


        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Terjadi Kesalahan Sistem, Hubungi Admin');
        }

    }

    public function permanen()
    {
        DB::beginTransaction();
        try {
            /** Permanen Proses Asesmen */
            $peserta = Peserta::where('no_peserta', $this->no_peserta)->first();
            $peserta->is_permanen = true;
            $peserta->save();
            $this->is_permanen = $peserta->is_permanen;

            $total_sks_diakui = 0;

            $formulirAplikasiRplList = FormulirAplikasiRpl::with('transferSks', 'matakuliah')
                ->where('no_peserta', $this->no_peserta)
                ->get();



            foreach ($formulirAplikasiRplList as $formulir) {
                if($formulir->transferSks){
                    if($formulir->transferSks->NilaiTransferSks){
                        if ($formulir->transferSks->NilaiTransferSks->is_lulus) {
                            $total_sks_diakui += $formulir->matakuliah->sks;
                        }
                    }
                }
                if($formulir->perolehanSks){
                    if($formulir->nilaiPerolehanSks){
                        if ($formulir->nilaiPerolehanSks->is_lulus) {
                            $total_sks_diakui += $formulir->matakuliah->sks;                    }
                    }
                }

            }
            $sks_harus_ditempuh  = Matakuliah::where('kode_prodi', $peserta->prodi_pilihan)->where('is_wajib', '1')->sum('sks');

            $total_sks_harus_ditempuh  = $sks_harus_ditempuh - $total_sks_diakui;

            $beritaAcaraAsesmen = BeritaAcaraAsesmen::updateOrCreate(
                ['no_peserta' => $this->no_peserta],
                [
                    'user_id'   => Auth::user()->id,
                    'prodi'     => $peserta->prodi_pilihan,
                    'no_peserta'    => $peserta->no_peserta,
                    'total_sks_diakui' => $total_sks_diakui,
                    'total_sks_harus_ditempuh'  => $total_sks_harus_ditempuh,
                ]
            );
            DB::commit();
            $this->dispatch('reload');
            flash()->success('Berhasil menyelesaikan proses Asesmen');
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Terjadi Kesalahan sistem.'.$e);
        }
    }

    public function render()
    {
        $peserta = Peserta::where('no_peserta', $this->no_peserta)->first();
        if(Auth::user()->role !== 'asesor' || Auth::user()->prodi !== $peserta->prodi_pilihan || $peserta->claim_by !== Auth::user()->id){
            $this->redirect(route('peserta-rpl'));
        }
        $dataEvaluasi = FormulirAplikasiRpl::where('no_peserta', $this->no_peserta)->get();
        return view('livewire.peserta-rpl.asesmen', compact('dataEvaluasi'));
    }
}
