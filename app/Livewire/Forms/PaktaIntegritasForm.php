<?php

namespace App\Livewire\Forms;

use App\Models\PaktaIntegritasRpl;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PaktaIntegritasForm extends Form
{
    public $nama_lengkap;
    public $jenis_kelamin;
    public $jabatan_fungsional;
    public $nik;
    public $nip;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $email;
    public $no_hp;
    public $alamat;
    public $no_telp;
    public $bidang_keilmuan;
    public $pendidikan_terakhir;
    public $nama_instansi;
    public $jabatan;
    public $keanggotan_asosiasi;

    #[Validate('required|mimes:pdf|max:2048')]
    public $file;

    public function save()
    {
        $this->validate([
            'nama_lengkap'        => 'required|string',
            'jenis_kelamin'       => 'required|string',
            'jabatan_fungsional'  => 'required|string',
            'nik'                 => 'required',
            'nip'                 => 'required',
            'tempat_lahir'        => 'required|string',
            'tanggal_lahir'       => 'required',
            'email'               => 'required|email',
            'no_hp'               => 'required',
            'alamat'              => 'required',
        ]);

        $data = [
            'user_id'             => Auth::user()->id,
            'nama_lengkap'        => $this->nama_lengkap,
            'jenis_kelamin'        => $this->jenis_kelamin,
            'jabatan_fungsional'  => $this->jabatan_fungsional,
            'nik'                 => $this->nik,
            'nip'                 => $this->nip,
            'tempat_lahir'        => $this->tempat_lahir,
            'tanggal_lahir'       => $this->tanggal_lahir,
            'email'               => $this->email,
            'no_hp'               => $this->no_hp,
            'alamat'              => $this->alamat,
            'no_telp'             => $this->no_telp,
            'bidang_keilmuan'     => $this->bidang_keilmuan,
            'pendidikan_terakhir' => $this->pendidikan_terakhir,
            'nama_instansi'       => $this->nama_instansi,
            'jabatan'             => $this->jabatan,
            'keanggotan_asosiasi' => $this->keanggotan_asosiasi,
        ];

        PaktaIntegritasRpl::updateOrCreate(
            ['user_id' => Auth::user()->id],
            $data
        );
    }

    public function upload()
    {
        $paktaIntegritas = PaktaIntegritasRpl::where('user_id', Auth::user()->id)->first();
        $paktaIntegritas->file = $this->file->store(path: 'public/pakta-integritas');
        $paktaIntegritas->save();
    }

}
