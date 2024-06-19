<?php

namespace App\Livewire\FormulirRiwayatHidup;

use App\Models\Peserta;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\RiwayatHidup;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Models\RiwayatHidupForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;
    #[Title("Formulir Riwayat Hidup")]
    protected $listeners = [
        'reload' => '$refresh'
    ];

    public $file;
    public $isUploaded = false;

    public function mount()
    {
        if(Auth::user()->peserta->is_permanen)
        {
            $this->redirect(route('biodata'));
        }
        if(!is_null(Auth::user()->peserta->file_form7)){
            $this->isUploaded = true;
        }
    }

    #[On('deleteData')]
    public function deleteData($dataKey)
    {
        $riwayatHidup = RiwayatHidup::where('key', $dataKey)->get();
        if($riwayatHidup){
            foreach ($riwayatHidup as $data) {
                $data->delete();
            }
        }
        flash()->success('Berhasil Menghapus Data');
        $this->dispatch('reload');
    }

    public function uploadUlang()
    {
        $this->isUploaded = false;
        $this->dispatch('reload');
    }

    public function uploadFile()
    {
        $peserta = Peserta::where('no_peserta', Auth::user()->no_peserta)->first();

        if(!is_null($peserta->file_form7))
        {
            if(Storage::exists($peserta->file_form7)){
                Storage::delete($peserta->file_form7);
            }
        }

        $peserta->file_form7 = $this->file->store(path: 'public/form-7');
        $peserta->save();

        flash()->success('File Formulir Aplikasi RPL (Form 7) Berhasil Di Upload');
        $this->reset('file');
        $this->isUploaded = true;
        $this->dispatch('reload');
    }
    public function render()
    {
        $riwayatHidupForms = RiwayatHidupForm::with(['fields', 'fields.riwayatHidup' => function ($query) {
            $query->where('no_peserta', Auth::user()->no_peserta);
        }])->where('is_active', 1)->get();

        return view('livewire.formulir-riwayat-hidup.index', [
            'riwayatHidupForms' => $riwayatHidupForms
        ]);
    }
}
