<?php

namespace App\Livewire\AsesmenPrestasi;

use App\Livewire\Forms\AsesmenPrestasiForm;
use App\Models\MapelPendukung;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    #[Title('Asesmen Prestasi')]
    public $kode_prodi;
    public $kurikulum;
    public $jurusan;

    public $mapel_pendukung = [];

    protected $listeners = [
        'reload'    => '$refresh'
    ];
    public AsesmenPrestasiForm $form;



    public function mount()
    {
        $this->kode_prodi = Auth::user()->prodi;
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

    public function fetchMataPelajaranPendukung()
    {
        $this->mapel_pendukung = MapelPendukung::where([
            'kode_prodi' => $this->kode_prodi,
            'kurikulum' => $this->kurikulum,
            'jurusan' => $this->jurusan,
        ])->first();
        // dd($this->mapel_pendukung->nama);
    }

    public function submit()
    {
        $this->form->no_peserta = Auth::user()->no_peserta;
        $this->form->kode_prodi = Auth::user()->prodi;
        $this->form->kurikulum = $this->kurikulum;
        $this->form->jurusan = $this->jurusan;
        $this->form->save();
        // flash()->success('Data Asesmen Mandiri anda Berhasil Disubmit');
        $this->reset();
        $this->dispatch('reload');

    }

    public function render()
    {
        return view('livewire.asesmen-prestasi.index');
    }
}

