<?php

namespace App\Livewire\FormulirAplikasiRpl;

use App\Models\CapaianPembelajaran;
use Livewire\Component;
use App\Models\Matakuliah;
use Livewire\Attributes\On;

class Detail extends Component
{
    public $show = false;

    public $nama_matakuliah;
    public $id_matakuliah;
    public $uraian;
    public $no = 1;



    #[On('showDetail')]
    public function showDetail(Matakuliah $matakuliah)
    {
        $this->nama_matakuliah = $matakuliah->nama;
        $this->uraian = $matakuliah->uraian;
        $this->id_matakuliah = $matakuliah->id;
        $this->show = true;
    }
    public function closeModal(){
        $this->show = false;
    }
    public function render()
    {
        $dataCpmk = CapaianPembelajaran::where('matakuliah_id', $this->id_matakuliah)->get();
        return view('livewire.formulir-aplikasi-rpl.detail', compact('dataCpmk'));
    }
}
