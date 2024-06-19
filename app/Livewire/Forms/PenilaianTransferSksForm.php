<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;

class PenilaianTransferSksForm extends Form
{
    #[Locked]
    public $formulir_aplikasi_rpl_id;
    public $nama_matakuliah_asal;
    public $sks_matakuliah_asal;
    public $nilai_matakuliah_asal;
    public $bukti_pendukung_id;

    public function store()
    {

    }
}
