<?php

namespace App\Livewire;

use App\Models\Peserta;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class HasilPenilaian extends Component
{
    use WithFileUploads;
    #[Title("Hasil Penilaian")]

    public $is_permanen;
    public $isUploaded = false;

    public $file;
    public function mount(){
        $peserta = Peserta::where('no_peserta', Auth::user()->no_peserta)->first();
        if(!is_null(Auth::user()->peserta->file_form3)){
            $this->isUploaded = true;
        }
        $this->is_permanen = $peserta->is_permanen;
    }
    public function uploadUlang()
    {
        $this->isUploaded = false;
        $this->dispatch('reload');
    }
    public function uploadFile()
    {
        $peserta = Peserta::where('no_peserta', Auth::user()->no_peserta)->first();

        if(!is_null($peserta->file_form3))
        {
            if(Storage::exists($peserta->file_form3)){
                Storage::delete($peserta->file_form3);
            }
        }

        $peserta->file_form3 = $this->file->store(path: 'public/form-3');
        $peserta->save();

        flash()->success('File Formulir Aplikasi RPL (Form 3) Berhasil Di Upload');
        $this->reset('file');
        $this->isUploaded = true;
        $this->dispatch('reload');
    }
    public function render()
    {
        return view('livewire.hasil-penilaian');
    }
}
