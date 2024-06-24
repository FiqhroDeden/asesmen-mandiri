<?php

namespace App\Livewire\Matakuliah;

use Livewire\Component;
use App\Models\Matakuliah;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    // use WithPagination;

    #[Title("Daftar Matakuliah")]

    public $search = '';
    public $keterangan = '';
    public $semester = '';
    public $no = 1;
    public $form = [];

    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function mount()
    {
        $this->initializeForm();
    }

    public function initializeForm()
    {
        $dataMatakuliah = Matakuliah::where('kode_prodi', Auth::user()->prodi)
            ->orderBy('semester', 'asc')
            ->get();

        foreach ($dataMatakuliah as $matakuliah) {
            $this->form[$matakuliah->id] = [
                'is_rpl' => $matakuliah->is_rpl ? true : false
            ];
        }
    }

    public function updatedForm($value, $key)
    {
        list($matakuliahId, $field) = explode('.', str_replace('form.', '', $key));
        Matakuliah::where('id', $matakuliahId)->update([$field => $value]);
    }

    public function render()
    {
        $dataMatakuliah = Matakuliah::query()
            ->where('kode_prodi', Auth::user()->prodi)
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('kode', 'like', '%' . $this->search . '%')
                      ->orWhere('nama', 'like', '%' . $this->search . '%')
                      ->orWhere('tahun_berlaku', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->keterangan !== '', function ($query) {
                $query->where('is_wajib', $this->keterangan);
            })
            ->when($this->semester !== '', function ($query) {
                $query->where('semester', $this->semester);
            })
            ->orderBy('semester', 'asc')
            ->get();

        return view('livewire.matakuliah.index', compact('dataMatakuliah'));
    }
}
