<?php

namespace App\Livewire;

use App\Models\Peserta;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\BiodataForm;
use Illuminate\Support\Facades\Auth;

class Biodata extends Component
{
    #[Title("Biodata")]

    public BiodataForm $form;

    public function mount()
    {
        $peserta = Peserta::where('nik', Auth::user()->username)->first();
        $this->form->no_peserta = $peserta->no_peserta;
        $this->form->prodi_pilihan = $peserta->prodi->nama_prodi;
        $this->form->nik = $peserta->nik;
        $this->form->nama = $peserta->nama;
        $this->form->tempat_lahir = $peserta->tempat_lahir;
        $this->form->tanggal_lahir = $peserta->tanggal_lahir;
        $this->form->jenis_kelamin = $peserta->jenis_kelamin;
        $this->form->status_perkawinan = $peserta->status_perkawinan;
        $this->form->agama = $peserta->agama;
        $this->form->no_hp = $peserta->no_hp;
        $this->form->email = $peserta->email;
        $this->form->alamat = $peserta->alamat;
        $this->form->kode_pos = $peserta->kode_pos;
        $this->form->kebangsaan = $peserta->kebangsaan;
        $this->form->tempat_kerja = $peserta->tempat_kerja;
        $this->form->pekerjaan = $peserta->pekerjaan;
        $this->form->jabatan = $peserta->jabatan;
        $this->form->status_pekerja = $peserta->status_pekerja;
        $this->form->alamat_tempat_kerja = $peserta->alamat_tempat_kerja;
        $this->form->telp_faks = $peserta->telp_faks;
        $this->form->pendidikan_terakhir = $peserta->pendidikan_terakhir;
        $this->form->nama_pt = $peserta->nama_pt;
        $this->form->program_studi = $peserta->program_studi;
        $this->form->tahun_lulus = $peserta->tahun_lulus;
    }

    public function simpan()
    {
        $this->form->update();
    }
    public function render()
    {
        return view('livewire.biodata');
    }
}
