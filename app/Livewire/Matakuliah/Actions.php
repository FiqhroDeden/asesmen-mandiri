<?php

namespace App\Livewire\Matakuliah;

use App\Livewire\Forms\MatakuliahForm;
use App\Models\Matakuliah;
use Livewire\Component;
use Livewire\Attributes\On;

class Actions extends Component
{
    public $show = false;

    public MatakuliahForm $form;

    #[On('editMatakuliah')]
    public function editMatakuliah(Matakuliah $matakuliah){
        $this->form->setMatakuliah($matakuliah);
        $this->show = true;
    }

    public function closeModal(){
        $this->show = false;
        $this->form->reset();
    }

    public function simpan()
    {
        if(isset($this->form->matakuliah)){
            $this->form->update();
        }
        $this->closeModal();
        $this->dispatch('reload');
    }
    public function render()
    {
        return view('livewire.matakuliah.actions');
    }
}
