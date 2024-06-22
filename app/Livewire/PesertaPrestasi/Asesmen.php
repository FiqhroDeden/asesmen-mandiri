<?php

namespace App\Livewire\PesertaPrestasi;

use App\Models\Peserta;
use Livewire\Component;
use App\Models\MapelPendukung;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\AsesmenPrestasiForm;
use Livewire\Attributes\On;

class Asesmen extends Component
{
    #[Title('Asesmen Prestasi')]
    public $no_peserta;
    public $kode_prodi;
    public $kurikulum;
    public $jurusan;

    public $mapel_pendukung = [];

    public $file_rapor;
    protected $listeners = [
        'reload'    => '$refresh'
    ];
    public AsesmenPrestasiForm $form;

    public Peserta $peserta;
    public $is_permanen;

    public function mount($no_peserta)
    {
        $this->peserta = Peserta::where('no_peserta', $no_peserta)->first();
        $this->is_permanen = $this->peserta->is_permanen;
        $this->no_peserta = $this->peserta->no_peserta;
        $this->kurikulum = $this->peserta->asesmenPrestasi->kurikulum;
        $this->jurusan = $this->peserta->asesmenPrestasi->jurusan;
        $this->kode_prodi = $this->peserta->prodi_pilihan;
        $this->fetchMataPelajaranPendukung();

        $nilai = $this->peserta->asesmenPrestasi;
        $this->form->kurikulum = $this->kurikulum;
        $this->form->jurusan = $this->jurusan;
        $this->file_rapor = $nilai->file_path;

        $this->form->semester_1_bahasa_indonesia = $nilai->semester_1_bahasa_indonesia;
        $this->form->semester_1_bahasa_inggris = $nilai->semester_1_bahasa_inggris;
        $this->form->semester_1_matematika = $nilai->semester_1_matematika;
        $this->form->semester_1_ipa = $nilai->semester_1_ipa;
        $this->form->semester_1_ips = $nilai->semester_1_ips;

        $this->form->semester_2_bahasa_indonesia = $nilai->semester_2_bahasa_indonesia;
        $this->form->semester_2_bahasa_inggris = $nilai->semester_2_bahasa_inggris;
        $this->form->semester_2_matematika = $nilai->semester_2_matematika;
        $this->form->semester_2_ipa = $nilai->semester_2_ipa;
        $this->form->semester_2_ips = $nilai->semester_2_ips;

        $this->form->semester_3_bahasa_indonesia = $nilai->semester_3_bahasa_indonesia;
        $this->form->semester_3_bahasa_inggris = $nilai->semester_3_bahasa_inggris;
        $this->form->semester_3_matematika = $nilai->semester_3_matematika;
        $this->form->semester_3_mapel_pendukung = $nilai->semester_3_mapel_pendukung;

        $this->form->semester_4_bahasa_indonesia = $nilai->semester_4_bahasa_indonesia;
        $this->form->semester_4_bahasa_inggris = $nilai->semester_4_bahasa_inggris;
        $this->form->semester_4_matematika = $nilai->semester_4_matematika;
        $this->form->semester_4_mapel_pendukung = $nilai->semester_4_mapel_pendukung;

        $this->form->semester_5_bahasa_indonesia = $nilai->semester_5_bahasa_indonesia;
        $this->form->semester_5_bahasa_inggris = $nilai->semester_5_bahasa_inggris;
        $this->form->semester_5_matematika = $nilai->semester_5_matematika;
        $this->form->semester_5_mapel_pendukung = $nilai->semester_5_mapel_pendukung;

        $this->form->semester_6_bahasa_indonesia = $nilai->semester_6_bahasa_indonesia;
        $this->form->semester_6_bahasa_inggris = $nilai->semester_6_bahasa_inggris;
        $this->form->semester_6_matematika = $nilai->semester_6_matematika;
        $this->form->semester_6_mapel_pendukung = $nilai->semester_6_mapel_pendukung;


    }

    public function updatedKurikulum($value)
    {
        $this->jurusan = ''; // Reset jurusan if kurikulum changes
        $this->fetchMataPelajaranPendukung();
    }

    public function updatedJurusan($value)
    {
        $this->fetchMataPelajaranPendukung();
    }

    public function submit()
    {
        $this->form->no_peserta = $this->no_peserta;
        $this->form->kode_prodi = $this->kode_prodi;
        $this->form->kurikulum = $this->kurikulum;
        $this->form->jurusan = $this->jurusan;
        $this->form->update();
        // flash()->success('Data Asesmen Mandiri anda Berhasil Disubmit');
        $this->dispatch('reload');

    }

    public function fetchMataPelajaranPendukung()
    {
        $this->mapel_pendukung = MapelPendukung::where([
            'kode_prodi' => $this->kode_prodi,
            'kurikulum' => $this->kurikulum,
            'jurusan' => $this->jurusan,
        ])->first();
        // dd($this->mapel_pendukung->nama);
    }

    public function permanen()
    {
        $this->peserta->is_permanen = 1;
        $this->peserta->save();
        flash()->success('Permanen berhasil dilakukan');
        $this->is_permanen = 1;
        $this->dispatch('reload');

    }
    public function render()
    {
        return view('livewire.peserta-prestasi.asesmen');
    }
}
