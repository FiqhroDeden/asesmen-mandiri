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
    #[Validate('max:2048', message: 'Ukuran File yang di upload tidak boleh lebih dari 2MB')]
    public $file;

    public ?BuktiPendukung $buktiPendukung;

    public function store(){
        // dd($this->file);
        $this->validate([
            'file'  => 'required|mimes:pdf|max:2024'
        ], [
            'file'  => [
                'max'   => 'Harap File diupload tidak lebih dari 2MB'
            ]
        ]);
        try {
            $buktiPendukung = new BuktiPendukung();
            $buktiPendukung->no_peserta = Auth::user()->no_peserta;
            $buktiPendukung->nama = $this->nama;
            $buktiPendukung->uraian =  $this->uraian;
            $buktiPendukung->path = $this->file->store(path: 'public/bukti-pendukung');
            $buktiPendukung->save();
            $this->reset();
            flash()->success('Bukti pendukung berhasil ditambahkan');
        } catch (\Exception $e) {

            flash()->error('Gagal Mengupload File.. mohon di periksa kembali file yang diupload');
        }

    }

    public function update(){

    }


}
