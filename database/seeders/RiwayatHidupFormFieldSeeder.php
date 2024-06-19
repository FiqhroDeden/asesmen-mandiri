<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiwayatHidupFormFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('riwayat_hidup_form_fields')->insert([
            [
                'riwayat_hidup_form_id'=> '1',
                'slug'=> 'nama-sekolah',
                'name'  => 'Nama Sekolah'
            ],
            [
                'riwayat_hidup_form_id'=> '1',
                'slug'=> 'tahun-lulus',
                'name'  => 'Tahun Lulus'
            ],
            [
                'riwayat_hidup_form_id'=> '1',
                'slug'=> 'jurusan-prodi',
                'name'  => 'Jurusan/Program Studi'
            ],
            [
                'riwayat_hidup_form_id'=> '2',
                'slug'=> 'tahun-pelatihan',
                'name'  => 'Tahun',
            ],
            [
                'riwayat_hidup_form_id'=> '2',
                'slug'=> 'nama-pelatihan',
                'name'  => 'Nama Pelatihan(dalam/ luar negeri) dan disebutkan uraian materinya',
            ],
            [
                'riwayat_hidup_form_id'=> '2',
                'slug'=> 'penyelengara',
                'name'  => 'Penyelenggara',
            ],
            [
                'riwayat_hidup_form_id'=> '2',
                'slug'=> 'jangka-waktu',
                'name'  => 'Jangka waktu',
            ],
            [
                'riwayat_hidup_form_id'=> '3',
                'slug'=> 'tahun-seminar',
                'name'  => 'Tahun',
            ],
            [
                'riwayat_hidup_form_id'=> '3',
                'slug'=> 'judul-seminar',
                'name'  => 'Judul Seminar/lokakarya/simposium',
            ],
            [
                'riwayat_hidup_form_id'=> '3',
                'slug'=> 'penyelengara-seminar',
                'name'  => 'Penyelenggara',
            ],
            [
                'riwayat_hidup_form_id'=> '3',
                'slug'=> 'status-keikutsertaan',
                'name'  => 'Status keikutsertaan: Panitia/ peserta/pembicara',
            ],
            [
                'riwayat_hidup_form_id'=> '4',
                'slug'=> 'tahun-penghargaan',
                'name'  => 'Tahun',
            ],
            [
                'riwayat_hidup_form_id'=> '4',
                'slug'=> 'bentuk-penghargaan',
                'name'  => 'Bentuk Penghargaan',
            ],
            [
                'riwayat_hidup_form_id'=> '4',
                'slug'=> 'pemberi-penghargaan',
                'name'  => 'Pemberi Penghargaan',
            ],
            [
                'riwayat_hidup_form_id'=> '5',
                'slug'=> 'tahun-organisasi',
                'name'  => 'Tahun',
            ],
            [
                'riwayat_hidup_form_id'=> '5',
                'slug'=> 'nama-organisasi',
                'name'  => 'Jenis/ Nama Organisasi',
            ],
            [
                'riwayat_hidup_form_id'=> '5',
                'slug'=> 'jabatan-organisasi',
                'name'  => 'Jabatan/jenjang keanggotaan',
            ],
            [
                'riwayat_hidup_form_id'=> '6',
                'slug'=> 'nama-alamat-tempat-kerja',
                'name'  => 'Nama dan Alamat Institusi/Perusahaan',
            ],
            [
                'riwayat_hidup_form_id'=> '6',
                'slug'=> 'periode-bekerja',
                'name'  => 'Periode Bekerja (Tgl/bln/th)',
            ],
            [
                'riwayat_hidup_form_id'=> '6',
                'slug'=> 'posisi-jabatan-pekerjaan',
                'name'  => 'Posisi/jabatan',
            ],
            [
                'riwayat_hidup_form_id'=> '6',
                'slug'=> 'uraian-pekerjaan',
                'name'  => 'Uraian Tugas utama pada posisi pekerjaan tersebut',
            ],
        ]);
    }
}
