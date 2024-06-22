<?php

namespace App\Livewire;

use App\Models\Peserta;
use Livewire\Component;
use App\Models\Matakuliah;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    #[Title('Dashboard')]

    public $jumlah_peserta = 0;
    public $jumlah_matakuliah = 0;
    public $jumlah_peserta_selesai = 0;
    public $sisa_peserta = 0;

    public function mount()
    {
        if(Auth::user()->role == 'admin'){
            $this->jumlah_peserta = Peserta::count();
            $this->jumlah_matakuliah = Matakuliah::count();
            $this->jumlah_peserta_selesai = Peserta::where('is_permanen', 1)->count();
            $this->sisa_peserta = Peserta::where('prodi_pilihan', Auth::user()->prodi)->where('is_permanen', 0)->count();
        }else{
            $this->jumlah_peserta = Peserta::where('prodi_pilihan', Auth::user()->prodi)->count();
            $this->jumlah_matakuliah = Matakuliah::where('kode_prodi', Auth::user()->prodi)->count();
            $this->jumlah_peserta_selesai = Peserta::where('prodi_pilihan', Auth::user()->prodi)->where('is_permanen', 1)->count();
            $this->sisa_peserta = Peserta::where('prodi_pilihan', Auth::user()->prodi)->where('is_permanen', 0)->count();
        }

    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
