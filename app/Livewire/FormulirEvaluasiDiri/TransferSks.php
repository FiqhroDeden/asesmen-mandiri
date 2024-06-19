<?php

namespace App\Livewire\FormulirEvaluasiDiri;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\BuktiPendukung;
use App\Models\FormulirAplikasiRpl;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\TransferSksForm;


class TransferSks extends Component
{
    public $show = false;
    public $nama_matakuliah;
    public $formulir_id;
    public TransferSksForm $form;


    #[On("makeTransferSks")]
    public function makeTransferSks(FormulirAplikasiRpl $evaluasi)
    {
        $this->form->setForm($evaluasi);
        $this->nama_matakuliah = $evaluasi->matakuliah->nama;
        $this->show = true;
    }

    public function simpan(){
        // dd($this->form);

        $this->form->store();

        $this->closeModal();
        $this->dispatch('reload');
    }

    public function closeModal(){
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.formulir-evaluasi-diri.transfer-sks', [
            'dataBuktiPendukung' => BuktiPendukung::where('no_peserta', Auth::user()->no_peserta)->get()
        ]);
    }
}
