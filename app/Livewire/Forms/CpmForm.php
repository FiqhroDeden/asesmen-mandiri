<?php

namespace App\Livewire\Forms;

use App\Models\CapaianPembelajaran;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CpmForm extends Form
{
    public $capaian;
    public $matakuliah_id;

    public function setIdMatakuliah($matakuliah_id)
    {
        $this->matakuliah_id = $matakuliah_id;
    }
    public function store()
    {
        $this->validate([
            'capaian'   => 'required'
        ]);

        $capaianPembelajaran = new CapaianPembelajaran();
        $capaianPembelajaran->matakuliah_id = $this->matakuliah_id;
        $capaianPembelajaran->capaian = $this->capaian;
        $capaianPembelajaran->save();

        $this->reset('capaian');
        flash()->success('CPM Berhasil Ditambahkan');

    }
}
