<?php

namespace App\Livewire\Forms;

use App\Models\AsesmenPrestasi;
use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AsesmenPrestasiForm extends Form
{
    #[Validate('mimes:pdf|max:5024')]
    public $file;



    #[Validate('required|string')]
    public $no_peserta;

    #[Validate('required|string')]
    public $kode_prodi;

    #[Validate('required|string')]
    public $kurikulum;

    public $jurusan;

    // Variabel untuk nilai setiap semester dan mata pelajaran
    public $semester_1_bahasa_indonesia;
    public $semester_1_bahasa_inggris;
    public $semester_1_matematika;
    public $semester_1_ipa;
    public $semester_1_ips;

    public $semester_2_bahasa_indonesia;
    public $semester_2_bahasa_inggris;
    public $semester_2_matematika;
    public $semester_2_ipa;
    public $semester_2_ips;

    public $semester_3_bahasa_indonesia;
    public $semester_3_bahasa_inggris;
    public $semester_3_matematika;
    public $semester_3_mapel_pendukung;

    public $semester_4_bahasa_indonesia;
    public $semester_4_bahasa_inggris;
    public $semester_4_matematika;
    public $semester_4_mapel_pendukung;

    public $semester_5_bahasa_indonesia;
    public $semester_5_bahasa_inggris;
    public $semester_5_matematika;
    public $semester_5_mapel_pendukung;

    public $semester_6_bahasa_indonesia;
    public $semester_6_bahasa_inggris;
    public $semester_6_matematika;
    public $semester_6_mapel_pendukung;

    // Validasi untuk setiap nilai mata pelajaran
    public function rules()
    {
        return [
            'no_peserta' => 'required|string',
            'kode_prodi' => 'required|string',
            'kurikulum' => 'required|string',
            'jurusan' => 'nullable|string',
            'file' => 'mimes:pdf|max:5024',
            'semester_1_bahasa_indonesia' => 'nullable|numeric|min:0|max:100',
            'semester_1_bahasa_inggris' => 'nullable|numeric|min:0|max:100',
            'semester_1_matematika' => 'nullable|numeric|min:0|max:100',
            'semester_1_ipa' => 'nullable|numeric|min:0|max:100',
            'semester_1_ips' => 'nullable|numeric|min:0|max:100',
            'semester_2_bahasa_indonesia' => 'nullable|numeric|min:0|max:100',
            'semester_2_bahasa_inggris' => 'nullable|numeric|min:0|max:100',
            'semester_2_matematika' => 'nullable|numeric|min:0|max:100',
            'semester_2_ipa' => 'nullable|numeric|min:0|max:100',
            'semester_2_ips' => 'nullable|numeric|min:0|max:100',
            'semester_3_bahasa_indonesia' => 'nullable|numeric|min:0|max:100',
            'semester_3_bahasa_inggris' => 'nullable|numeric|min:0|max:100',
            'semester_3_matematika' => 'nullable|numeric|min:0|max:100',
            'semester_3_mapel_pendukung' => 'nullable|numeric|min:0|max:100',
            'semester_4_bahasa_indonesia' => 'nullable|numeric|min:0|max:100',
            'semester_4_bahasa_inggris' => 'nullable|numeric|min:0|max:100',
            'semester_4_matematika' => 'nullable|numeric|min:0|max:100',
            'semester_4_mapel_pendukung' => 'nullable|numeric|min:0|max:100',
            'semester_5_bahasa_indonesia' => 'nullable|numeric|min:0|max:100',
            'semester_5_bahasa_inggris' => 'nullable|numeric|min:0|max:100',
            'semester_5_matematika' => 'nullable|numeric|min:0|max:100',
            'semester_5_mapel_pendukung' => 'nullable|numeric|min:0|max:100',
            'semester_6_bahasa_indonesia' => 'nullable|numeric|min:0|max:100',
            'semester_6_bahasa_inggris' => 'nullable|numeric|min:0|max:100',
            'semester_6_matematika' => 'nullable|numeric|min:0|max:100',
            'semester_6_mapel_pendukung' => 'nullable|numeric|min:0|max:100',
        ];
    }



    public function save()
    {
        DB::beginTransaction();

        try {

            $asesmenPrestasi = AsesmenPrestasi::updateOrCreate(
                ['no_peserta' => $this->no_peserta],
                [
                    'kode_prodi' => $this->kode_prodi,
                    'kurikulum' => $this->kurikulum,
                    'jurusan' => $this->jurusan,
                    'semester_1_bahasa_indonesia' => $this->semester_1_bahasa_indonesia,
                    'semester_1_bahasa_inggris' => $this->semester_1_bahasa_inggris,
                    'semester_1_matematika' => $this->semester_1_matematika,
                    'semester_1_ipa' => $this->semester_1_ipa,
                    'semester_1_ips' => $this->semester_1_ips,
                    'semester_2_bahasa_indonesia' => $this->semester_2_bahasa_indonesia,
                    'semester_2_bahasa_inggris' => $this->semester_2_bahasa_inggris,
                    'semester_2_matematika' => $this->semester_2_matematika,
                    'semester_2_ipa' => $this->semester_2_ipa,
                    'semester_2_ips' => $this->semester_2_ips,
                    'semester_3_bahasa_indonesia' => $this->semester_3_bahasa_indonesia,
                    'semester_3_bahasa_inggris' => $this->semester_3_bahasa_inggris,
                    'semester_3_matematika' => $this->semester_3_matematika,
                    'semester_3_mapel_pendukung' => $this->semester_3_mapel_pendukung,
                    'semester_4_bahasa_indonesia' => $this->semester_4_bahasa_indonesia,
                    'semester_4_bahasa_inggris' => $this->semester_4_bahasa_inggris,
                    'semester_4_matematika' => $this->semester_4_matematika,
                    'semester_4_mapel_pendukung' => $this->semester_4_mapel_pendukung,
                    'semester_5_bahasa_indonesia' => $this->semester_5_bahasa_indonesia,
                    'semester_5_bahasa_inggris' => $this->semester_5_bahasa_inggris,
                    'semester_5_matematika' => $this->semester_5_matematika,
                    'semester_5_mapel_pendukung' => $this->semester_5_mapel_pendukung,
                    'semester_6_bahasa_indonesia' => $this->semester_6_bahasa_indonesia,
                    'semester_6_bahasa_inggris' => $this->semester_6_bahasa_inggris,
                    'semester_6_matematika' => $this->semester_6_matematika,
                    'semester_6_mapel_pendukung' => $this->semester_6_mapel_pendukung,
                    'file_path' => $this->file->store(path: 'public/rapor')
                ]
            );
            DB::commit();
            flash()->success('Data Asesmen Prestasi Berhasil Disimpan.');
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Terjadi kesalahan, silahkan menghubungi pengelola Asesmen Prestasi.'. $e);
        }
    }
    public function update()
    {


        DB::beginTransaction();

        try {

            $asesmenPrestasi = AsesmenPrestasi::updateOrCreate(
                ['no_peserta' => $this->no_peserta],
                [
                    'kode_prodi' => $this->kode_prodi,
                    'kurikulum' => $this->kurikulum,
                    'jurusan' => $this->jurusan,
                    'semester_1_bahasa_indonesia' => $this->semester_1_bahasa_indonesia,
                    'semester_1_bahasa_inggris' => $this->semester_1_bahasa_inggris,
                    'semester_1_matematika' => $this->semester_1_matematika,
                    'semester_1_ipa' => $this->semester_1_ipa,
                    'semester_1_ips' => $this->semester_1_ips,
                    'semester_2_bahasa_indonesia' => $this->semester_2_bahasa_indonesia,
                    'semester_2_bahasa_inggris' => $this->semester_2_bahasa_inggris,
                    'semester_2_matematika' => $this->semester_2_matematika,
                    'semester_2_ipa' => $this->semester_2_ipa,
                    'semester_2_ips' => $this->semester_2_ips,
                    'semester_3_bahasa_indonesia' => $this->semester_3_bahasa_indonesia,
                    'semester_3_bahasa_inggris' => $this->semester_3_bahasa_inggris,
                    'semester_3_matematika' => $this->semester_3_matematika,
                    'semester_3_mapel_pendukung' => $this->semester_3_mapel_pendukung,
                    'semester_4_bahasa_indonesia' => $this->semester_4_bahasa_indonesia,
                    'semester_4_bahasa_inggris' => $this->semester_4_bahasa_inggris,
                    'semester_4_matematika' => $this->semester_4_matematika,
                    'semester_4_mapel_pendukung' => $this->semester_4_mapel_pendukung,
                    'semester_5_bahasa_indonesia' => $this->semester_5_bahasa_indonesia,
                    'semester_5_bahasa_inggris' => $this->semester_5_bahasa_inggris,
                    'semester_5_matematika' => $this->semester_5_matematika,
                    'semester_5_mapel_pendukung' => $this->semester_5_mapel_pendukung,
                    'semester_6_bahasa_indonesia' => $this->semester_6_bahasa_indonesia,
                    'semester_6_bahasa_inggris' => $this->semester_6_bahasa_inggris,
                    'semester_6_matematika' => $this->semester_6_matematika,
                    'semester_6_mapel_pendukung' => $this->semester_6_mapel_pendukung,
                ]
            );

            DB::commit();
            flash()->success('Data Asesmen Prestasi ini Berhasil Disimpan.');
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Terjadi kesalahan, silahkan menghubungi pengelola Asesmen Prestasi.'. $e);
        }
    }
}
