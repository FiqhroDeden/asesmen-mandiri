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
    public $is_form3_uploaded;
    public $isUploaded = false;
    public $file;

    protected $listeners = [
        'reload'    => '$refresh'
    ];

    public function mount($no_peserta)
    {
        $peserta = Peserta::where('no_peserta', $no_peserta)->first();
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

            $acceptedGrades = ['A', 'B', 'C'];

            foreach ($formulirAplikasiRplList as $formulir) {
                if($formulir->transferSks){
                    if($formulir->transferSks->NilaiTransferSks){
                        if (in_array($formulir->transferSks->nilaiTransferSks->nilai, $acceptedGrades)) {
                            $total_sks_diakui += $formulir->matakuliah->sks;
                        }
                    }
                }
                if($formulir->perolehanSks){
                    if($formulir->nilaiPerolehanSks){
                        if (in_array($formulir->nilaiPerolehanSks->nilai, $acceptedGrades)) {
                            $total_sks_diakui += $formulir->matakuliah->sks;                    }
                    }
                }
            }
            $sks_harus_ditempuh  = Matakuliah::where('kode_prodi', $peserta->prodi_pilihan)->sum('sks');

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
