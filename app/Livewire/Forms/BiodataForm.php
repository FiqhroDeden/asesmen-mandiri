<?php

namespace App\Livewire\Forms;

use Livewire\Form;

use App\Models\Peserta;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BiodataForm extends Form
{
    public $no_peserta;
    public $prodi_pilihan;
    public $nik;
    public $nama;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jenis_kelamin;
    public $status_perkawinan;
    public $agama;
    public $no_hp;
    public $email;
    public $alamat;
    public $kode_pos;
    public $kebangsaan;
    public $tempat_kerja;
    public $pekerjaan;
    public $jabatan;
    public $status_pekerja;
    public $alamat_tempat_kerja;
    public $telp_faks;
    public $pendidikan_terakhir;
    public $nama_pt;
    public $program_studi;
    public $tahun_lulus;


    public function update()
    {
        $validate = $this->validate([
            'nik' => 'required|numeric|digits:16',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'agama' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'kebangsaan' => 'required',
            'tempat_kerja' => '',
            'pekerjaan' => '',
            'jabatan' => '',
            'status_pekerja' => '',
            'alamat_tempat_kerja' => '',
            'telp_faks' => '',
            'pendidikan_terakhir' => '',
            'nama_pt' => '',
            'program_studi' => '',
            'tahun_lulus' => '',

        ]);
        DB::beginTransaction();
        try {
            $peserta = Peserta::where('no_peserta', $this->no_peserta)->firstOrFail();
            $peserta->update($validate);
            DB::commit();
            flash()->success('Biodata Berhasil Disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('Error - '. $e->getMessage());
            flash()->error('Terjadi Kesalahan Sistem, harap coba lagi');
        }
    }

}
