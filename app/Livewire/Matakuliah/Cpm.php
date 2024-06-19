<?php

namespace App\Livewire\Matakuliah;

use App\Livewire\Forms\CpmForm;
use App\Models\CapaianPembelajaran;
use App\Models\Matakuliah;
use Livewire\Attributes\On;
use Livewire\Component;

class Cpm extends Component
{
    public $show = false;
    public $namaMatakuliah = '';

    public $idMatakuliah = '';
    public $no = 1;

    public CpmForm $form;

    #[On("cpmModal")]
    public function cpmModal(Matakuliah $matakuliah)
    {
        $this->show = true;
        $this->namaMatakuliah = $matakuliah->nama;
        $this->idMatakuliah = $matakuliah->id;
        $this->form->setIdMatakuliah($matakuliah->id);
    }
    public function closeModal(){
        $this->show = false;
        $this->form->reset('capaian');
    }

    public function simpan()
    {
        $this->form->store();
        $this->dispatch('reload');
    }

    #[On('deleteCpm')]
    public function deleteCpm(CapaianPembelajaran $cpm)
    {
        $cpm->delete();
        $this->dispatch('reload');
    }
    public function render()
    {
        $dataCpm = CapaianPembelajaran::where('matakuliah_id', $this->idMatakuliah)->get();
        return view('livewire.matakuliah.cpm', compact('dataCpm'));
    }
}
