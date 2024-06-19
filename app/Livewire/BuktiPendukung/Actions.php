<?php

namespace App\Livewire\BuktiPendukung;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use App\Livewire\Forms\BuktiPendukungForm;

class Actions extends Component
{
    use WithFileUploads;
    public $show = false;
    public BuktiPendukungForm $form;

    #[On("createBukti")]
    public function createBukti(){
        $this->show = true;
    }

    #[On("closeModal")]
    public function closeModal(){
        $this->show = false;
        $this->form->reset();
    }

    public function simpan(){
        if(isset($this->form->buktiPendukung)){
            $this->form->update();
        }else{
            $this->form->store();
        }
        $this->closeModal();
        $this->dispatch('reload');
    }
    public function render()
    {
        return view('livewire.bukti-pendukung.actions');
    }
}
