<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Peserta extends Component
{
    #[Title('Peserta')]
    public function render()
    {
        return view('livewire.peserta');
    }
}
