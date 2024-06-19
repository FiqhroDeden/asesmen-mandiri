<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Matakuliah;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class MatakuliahForm extends Form
{
    public $uraian;

    public ?Matakuliah $matakuliah;


    public function setMatakuliah(Matakuliah $matakuliah)
    {
        $this->matakuliah = $matakuliah;

        $this->uraian = $matakuliah->uraian;

    }

    public function update()
    {
        $validate = $this->validate([
            'uraian'  => 'required',
        ]);

        $this->matakuliah->update($validate);
        $this->reset();
        flash()->success('Matakuliah Berhasil Diubah');
    }
}
