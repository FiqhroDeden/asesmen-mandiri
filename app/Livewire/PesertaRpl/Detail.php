<?php

namespace App\Livewire\PesertaRpl;

use App\Models\Peserta;
use Livewire\Attributes\Title;
use Livewire\Component;

class Detail extends Component
{
    #[Title("Detail Peserta")]

    public Peserta $peserta;

    public function mount($no_peserta)
    {
        $this->peserta = Peserta::where('no_peserta', $no_peserta)->first();
    }
    public function render()
    {

        return view('livewire.peserta-rpl.detail');
    }
}
