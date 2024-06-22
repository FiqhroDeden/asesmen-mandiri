<?php

namespace App\Livewire\Matakuliah;

use Livewire\Component;
use App\Models\Matakuliah;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;
    #[Title("Daftar Matakuliah")]

    public $search;
    protected $listeners = [
        'reload'    => '$refresh'
    ];
    public $no = 1;

    public $form = [];

    public function mount()
    {
        $dataMatakuliah = Matakuliah::where('kode_prodi', Auth::user()->prodi)->orderBy('semester', 'asc')->get();
        foreach ($dataMatakuliah as $key => $matakuliah) {
            $this->form[$matakuliah->id] = [
                'is_rpl'    => $matakuliah->is_rpl ? true : false
            ];
        }
    }

    public function updatedForm($value, $key)
    {
        list($matakuliahId, $field) = explode('.', str_replace('form.', '', $key));

        // Update the database
        Matakuliah::where('id', $matakuliahId)->update([$field => $value]);
    }
    public function render()
    {
        $dataMatakuliah = Matakuliah::when($this->search, function ($query){
            $query->where('kode', 'like', '%'. $this->search .'%')
            ->orWhere('nama','like', '%'. $this->search .'%')
            ->orWhere('kurikulum','like', '%'. $this->search .'%');
        })->where('kode_prodi', Auth::user()->prodi)->orderBy('semester', 'asc')->paginate(10);
        return view('livewire.matakuliah.index', compact('dataMatakuliah'));
    }
}
