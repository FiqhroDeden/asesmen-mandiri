<?php

namespace App\Livewire\PesertaRpl;

use App\Models\Peserta;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class Index extends Component
{
    #[Title("Peserta RPL")]

    public $no = 1;

    protected $listeners = [
        'reload'    => '$refresh'
    ];
    #[On('klaim')]
    public function klaim (Peserta $peserta)
    {
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
    #[On('resetKlaim')]
    public function resetKlaim (Peserta $peserta)
    {

            $peserta->claim_by = null;
            $peserta->save();
            flash()->success('Klaim Berhasil direset');
            $this->dispatch('reload');


    }
    public function render()
    {
        $dataPeserta = Peserta::where(
            [
                'jalur_pendaftaran' => '53',
                'prodi_pilihan' => Auth::user()->prodi
            ]
        )->get();
        return view('livewire.peserta-rpl.index', compact('dataPeserta'));
    }
}
