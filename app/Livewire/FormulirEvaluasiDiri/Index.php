<?php

namespace App\Livewire\FormulirEvaluasiDiri;

use Livewire\Component;
use App\Models\TransferSks;
use App\Models\PerolehanSks;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use App\Models\FormulirAplikasiRpl;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    #[Title("Evaluasi Diri")]
    public $no = 1;
    protected $listeners = [
        'reload'    => '$refresh'
    ];

    public function mount()
    {
        if(Auth::user()->peserta->is_permanen)
        {
            $this->redirect(route('biodata'));
        }
    }

    #[On('resetInputTransferSks')]
    public function resetInputTransferSks(FormulirAplikasiRpl $formulir_aplikasi)
    {
        $transferSks = TransferSks::where('formulir_aplikasi_rpl_id', $formulir_aplikasi->id)->first();
        if($transferSks->buktiTransferSks){
            foreach($transferSks->buktiTransferSks as $bukti)
            {
                $bukti->delete();
            }
        }
        $transferSks->delete();
        flash()->success('Input Transfer SKS Berhasil Di Reset');
        $this->dispatch('reload');
    }
    #[On('resetInputPerolehanSks')]
    public function resetInputPerolehanSks(FormulirAplikasiRpl $formulir_aplikasi)
    {
        $dataPerolehanSks = PerolehanSks::where('formulir_aplikasi_rpl_id', $formulir_aplikasi->id)->with('buktiPerolehanSks')->get();

        if (!$dataPerolehanSks->isEmpty()) {
            foreach ($dataPerolehanSks as $perolehanSks) {
                // Delete associated BuktiPerolehanSks records
                $perolehanSks->buktiPerolehanSks()->delete();
                // Delete the PerolehanSks record
                $perolehanSks->delete();
            }
        }

        flash()->success('Input Perolehan Sks Berhasil Di Reset');
        $this->dispatch('reload');
    }


    public function render()
    {
        $dataEvaluasi = FormulirAplikasiRpl::where('no_peserta', Auth::user()->no_peserta)->get();

        return view('livewire.formulir-evaluasi-diri.index', compact('dataEvaluasi'));
    }
}
