<?php

namespace App\Livewire\FormulirAplikasiRpl;

use App\Models\Peserta;
use Livewire\Component;
use App\Models\Matakuliah;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use App\Models\FormulirAplikasiRpl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;


class Index extends Component
{
    use WithFileUploads;

    #[Title("Formulir Aplikasi RPL")]

    public ?Matakuliah $matakuliah;
    public $form = [];
    public $formulir= false;

    #[Validate('max:2048', message: 'Ukuran File yang di upload tidak boleh lebih dari 2MB')]
    public $file;

    public $isUploaded = false;
    protected $listeners = [
        'reload'    => '$refresh'
    ];

    public function mount()
    {
        if(Auth::user()->peserta->is_permanen)
        {
            $this->redirect(route('biodata'));
        }
        if(!is_null(Auth::user()->peserta->file_form2)){
            $this->isUploaded = true;
        }
        $dataMatakuliah = Matakuliah::where(
            [
                'kode_prodi' => Auth::user()->prodi,
                'is_rpl'    => true
            ]
        )->orderBy('semester', 'asc')->get();
        $checkFormulir = FormulirAplikasiRpl::where('no_peserta', Auth::user()->no_peserta)->get();

        if (!$checkFormulir->isEmpty()) {
            $this->formulir = true;

            $formulirData = $checkFormulir->keyBy('matakuliah_id');

            foreach ($dataMatakuliah as $matakuliah) {
                if ($formulirData->has($matakuliah->id)) {
                    $formulir = $formulirData->get($matakuliah->id);
                    $this->form[$matakuliah->id] = [
                        'status' => 'ya',
                        'keterangan' => $formulir->keterangan
                    ];
                } else {
                    $this->form[$matakuliah->id] = [
                        'status' => 'tidak',
                        'keterangan' => ''
                    ];
                }
            }
        } else {
            foreach ($dataMatakuliah as $matakuliah) {
                $this->form[$matakuliah->id] = [
                    'status' => 'tidak',
                    'keterangan' => ''
                ];
            }
        }
    }

    public function simpan()
    {
        $this->validate([
            'form.*.status' => 'required',
            'form.*.keterangan' => 'required_if:form.*.status,ya',
        ], [
            'form.*.status.required' => 'Harap Pilih Salah Satu',
            'form.*.keterangan.required_if' => 'Keterangan harus diisi jika memilih Ya'
        ]);

        DB::beginTransaction();

        try {
            $existingFormulirs = FormulirAplikasiRpl::where('no_peserta', Auth::user()->no_peserta)->get()->keyBy('matakuliah_id');
            foreach ($this->form as $matakuliahId => $data) {
                if ($data['status'] == 'ya') {
                    if (isset($existingFormulirs[$matakuliahId])) {
                        // Update existing record
                        $formulir = $existingFormulirs[$matakuliahId];
                        $formulir->keterangan = $data['keterangan'];
                        $formulir->save();
                    } else {
                        // Create new record
                        FormulirAplikasiRpl::create([
                            'no_peserta' => Auth::user()->no_peserta,
                            'matakuliah_id' => $matakuliahId,
                            'is_permanen' => 0,
                            'keterangan' => $data['keterangan']
                        ]);
                    }
                } elseif (isset($existingFormulirs[$matakuliahId])) {
                    // Delete the record if status is 'tidak'
                    if($existingFormulirs[$matakuliahId]->transferSks){
                        flash()->warning('Tidak bisa membatalkan status pengajuan Mata Kuliah <b>'. $existingFormulirs[$matakuliahId]->matakuliah->nama.'</b> Karena telah memiliki Data Transfer Sks, anda bisa mereset data transfer mata kuliah ini untuk mengubah status pengajuannya.');
                    }elseif($existingFormulirs[$matakuliahId]->perolehanSks->isNotEmpty()){
                        flash()->warning('Tidak bisa membatalkan status pengajuan Mata Kuliah <b>'. $existingFormulirs[$matakuliahId]->matakuliah->nama.'</b> Karena telah memiliki Data Perolehan Sks, anda bisa mereset data perolehan sks pada mata kuliah ini untuk mengubah status pengajuannya.');
                    }else{
                        $existingFormulirs[$matakuliahId]->delete();
                    }
                }
            }
            $peserta = Peserta::where('no_peserta', Auth::user()->no_peserta)->first();
            if($peserta->formulirAplikasiRpl->isEmpty())
            {
                if(!is_null($peserta->file_form2))
                {
                    if(Storage::exists($peserta->file_form2)){
                        Storage::delete($peserta->file_form2);
                    }
                    $peserta->file_form2 = null;
                    $peserta->save();
                }
            }
            DB::commit();

            $this->dispatch('reload');
            flash()->success('Data Formulir Aplikasi RPL Berhasil Disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Terjadi Kesalahan Sistem, Silahkan coba lagi nanti, Hubungi admin, '.$e->getMessage());
        }
    }

    public function uploadUlang()
    {
        $this->isUploaded = false;
        $this->dispatch('reload');
    }
    public function uploadFile()
    {
        $this->validate([
            'file'  => 'required|mimes:pdf|max:2048'
        ], [
            'file'  => [
                'max'   => 'Harap Ukuran File diupload tidak lebih dari 2MB'
            ]
        ]);
        DB::beginTransaction();
        try {
            $peserta = Peserta::where('no_peserta', Auth::user()->no_peserta)->first();

            if(!is_null($peserta->file_form2))
            {
                if(Storage::exists($peserta->file_form2)){
                    Storage::delete($peserta->file_form2);
                }
            }
            $peserta->file_form2 = $this->file->store(path: 'public/form-2');
            $peserta->save();
            DB::commit();

            flash()->success('File Formulir Aplikasi RPL (Form 2) Berhasil Di Upload');
            $this->reset('file');
            $this->isUploaded = true;
            $this->dispatch('reload');
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Terjadi Kesalahan Sistem, Silahkan coba lagi nanti,atau Hubungi admin,');
        }
    }
    public function render()
    {

        return view('livewire.formulir-aplikasi-rpl.index', [
            'dataMatakuliah' => Matakuliah::where('kode_prodi', Auth::user()->prodi)->orderBy('semester', 'asc')->get()
        ]);
    }
}
