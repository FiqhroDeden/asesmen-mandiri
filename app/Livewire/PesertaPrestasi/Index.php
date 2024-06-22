<?php

namespace App\Livewire\PesertaPrestasi;

use App\Models\Peserta;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    #[Title('Peserta Prestasi')]

    public $no = 1;
    protected $listeners = [
        'reload'    => '$refresh'
    ];
    #[On('klaim')]
    public function klaim (Peserta $peserta)
    {
        // dd('test');
        if($peserta->claim_by !== null){
            $this->dispatch('reload');
            flash()->warning('Peserta Ini Sudah Di Klaim');
        }else{
            $peserta->claim_by = Auth::user()->id;
            $peserta->save();
            flash()->success('Klaim Berhasil');
            $this->dispatch('reload');
        }

    }
    public function render()
    {
        $dataPeserta = Peserta::where('jalur_pendaftaran', '52')->get();
        return view('livewire.peserta-prestasi.index', compact('dataPeserta'));
    }
}
