<?php

namespace App\Livewire\FormulirRiwayatHidup;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use App\Models\RiwayatHidup;
use App\Models\RiwayatHidupForm;
use Illuminate\Support\Facades\Auth;
use App\Models\RiwayatHidupFormField;

class Actions extends Component
{
    public $show = false;
    public $fields = [];
    public $form_id = "";
    public $form = [];
    public $form_name;

    #[On("createData")]
    public function createData(RiwayatHidupForm $form)
    {
        $this->form_id = $form->id;
        $this->form_name = $form->name;
        $this->fields = $form->fields; // Only get fields related to the specific form
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
        $this->reset();
    }
    private function generateKey() {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $key = '';
        $length = 11;

        $key .= strtoupper(Str::random(1));
        $key .= strtolower(Str::random(1));

        // Minimal satu angka
        $key .= rand(0, 9);

        // Sisanya diisi dengan karakter acak
        for ($i = strlen($key); $i < $length; $i++) {
            $key .= $chars[rand(0, strlen($chars) - 1)];
        }

        // Acak urutan karakter dalam key
        $key = str_shuffle($key);

        return $key;
    }
    public function simpan()
    {
        $rules = [];
        foreach ($this->fields as $field) {
            $rules['form.' . $field->slug] = 'required'; // Add other validation rules as needed
        }

        $this->validate($rules);
        $RiwayatHidupKey = $this->generateKey();
        foreach ($this->form as $key => $value) {
            $field = RiwayatHidupFormField::where('slug', $key)->first();

            if ($field) {
                $riwayat_hidup = new RiwayatHidup();
                $riwayat_hidup->key = $RiwayatHidupKey;
                $riwayat_hidup->no_peserta = Auth::user()->no_peserta;
                $riwayat_hidup->riwayat_hidup_form_id = $this->form_id;
                $riwayat_hidup->riwayat_hidup_form_field_id = $field->id;
                $riwayat_hidup->value = $value;
                $riwayat_hidup->save();
            }
        }
        flash()->success('Data Berhasil Ditambahkan');
        $this->dispatch('reload');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.formulir-riwayat-hidup.actions');
    }
}
