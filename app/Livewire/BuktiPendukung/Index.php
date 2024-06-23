<?php

namespace App\Livewire\BuktiPendukung;


use Livewire\Component;
use App\Models\BuktiPendukung;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    #[Title("Upload Bukti Pendukung")]
    protected $listeners = [
        'reload'    => '$refresh'
    ];
    public $no = 1;

    public function mount()
    {
        if(Auth::user()->peserta->is_permanen)
        {
            $this->redirect(route('biodata'));
        }
    }

    #[On("deleteBukti")]
    public function deleteBukti(BuktiPendukung $bukti)
    {

        if($bukti->buktiTransferSks()->count() > 0 || $bukti->buktiPerolehanSks()->count() > 0){
            flash()->warning('Tidak bisa menghapus File ini, File ini sedang digunakan pada data Pengajuan RPL anda.');
        }else{
            if(Storage::exists($bukti->path)){
                Storage::delete($bukti->path);
            }
            $bukti->delete();
            flash()->success('Bukti Pendukung Berhasil Dihapus');
            $this->dispatch('reload');
        }


    }
    public function render()
    {
        return view('livewire.bukti-pendukung.index', [
            'dataBukti' => BuktiPendukung::where('no_peserta', Auth::user()->no_peserta)->get(),
        ]);
    }
}
