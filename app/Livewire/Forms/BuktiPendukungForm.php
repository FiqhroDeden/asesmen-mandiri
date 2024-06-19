<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\WithFileUploads;
use App\Models\BuktiPendukung;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class BuktiPendukungForm extends Form
{

    #[Validate('required')]
    public $nama;
    public $uraian;
    #[Validate('required|mimes:pdf,doc,docx|max:2048')]
    public $file;

    public ?BuktiPendukung $buktiPendukung;

    public function store(){
        // dd($this->file);
        $buktiPendukung = new BuktiPendukung();
        $buktiPendukung->no_peserta = Auth::user()->no_peserta;
        $buktiPendukung->nama = $this->nama;
        $buktiPendukung->uraian =  $this->uraian;
        $buktiPendukung->path = $this->file->store(path: 'public/bukti-pendukung');
        $buktiPendukung->save();
        $this->reset();
        flash()->success('Bukti pendukung berhasil ditambahkan');
    }

    public function update(){

    }


}
