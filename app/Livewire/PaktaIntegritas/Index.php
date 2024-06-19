<?php

namespace App\Livewire\PaktaIntegritas;

use App\Livewire\Forms\PaktaIntegritasForm;
use App\Models\PaktaIntegritasRpl;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    #[Title("Pakta Integritas")]

    public $showDownload = false;
    protected $listeners = [
        'reload'    => '$refresh'
    ];
    public PaktaIntegritasForm $form;

    public function mount()
    {
        $paktaIntegritas = PaktaIntegritasRpl::where("user_id",Auth::user()->id)->first();
        if($paktaIntegritas)
        {
            $this->showDownload = true;
            $this->form->nama_lengkap = $paktaIntegritas->nama_lengkap;
            $this->form->jenis_kelamin = $paktaIntegritas->jenis_kelamin;
            $this->form->jabatan_fungsional = $paktaIntegritas->jabatan_fungsional;
            $this->form->nik = $paktaIntegritas->nik;
            $this->form->nip = $paktaIntegritas->nip;
            $this->form->tempat_lahir = $paktaIntegritas->tempat_lahir;
            $this->form->tanggal_lahir = $paktaIntegritas->tanggal_lahir;
            $this->form->email = $paktaIntegritas->email;
            $this->form->no_hp = $paktaIntegritas->no_hp;
            $this->form->alamat = $paktaIntegritas->alamat;
            $this->form->no_telp = $paktaIntegritas->no_telp;
            $this->form->bidang_keilmuan = $paktaIntegritas->bidang_keilmuan;
            $this->form->pendidikan_terakhir = $paktaIntegritas->pendidikan_terakhir;
            $this->form->nama_instansi = $paktaIntegritas->nama_instansi;
            $this->form->jabatan = $paktaIntegritas->jabatan;
            $this->form->keanggotan_asosiasi = $paktaIntegritas->keanggotan_asosiasi;
        }
    }
    public function simpan()
    {
        $this->form->save();
        $this->showDownload = true;
        flash()->success("Pakta Integritas Berhasil Disimpan");
        $this->dispatch('reload');
    }

    public function uploadFile()
    {

        $this->form->upload();
        flash()->success('Pakta Integritas Berhasil di upload');
        return redirect()->route('peserta-rpl');
    }

    public function render()
    {
        return view('livewire.pakta-integritas.index', [
            'paktaIntegritas'   => PaktaIntegritasRpl::where('user_id', Auth::user()->id)->first()
        ]);
    }
}
