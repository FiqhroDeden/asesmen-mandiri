<?php

namespace App\Livewire\PesertaRpl;

use App\Models\Peserta;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\FormulirAplikasiRpl as FormulirAplikasiRplModel;

class FormulirAplikasiRpl extends Component
{
    public $show = false;
    public $nama_peserta;
    public $no_peserta;
    public $no = 1;

    #[On("showFormulirRpl")]
    public function showFormulirRpl($no_peserta)
    {
        $peserta = Peserta::where('no_peserta', $no_peserta)->first();
        $this->nama_peserta = $peserta->nama;
        $this->no_peserta = $no_peserta;
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
        $this->reset();
    }
    public function render()
    {
        $dataFormulirRpl = FormulirAplikasiRplModel::where('no_peserta', $this->no_peserta)->get();
        return view('livewire.peserta-rpl.formulir-aplikasi-rpl', compact('dataFormulirRpl'));
    }
}
