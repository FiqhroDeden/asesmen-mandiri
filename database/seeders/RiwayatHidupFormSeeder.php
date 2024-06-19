<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiwayatHidupFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('riwayat_hidup_forms')->insert([
            [
            'slug'  => 'riwayat-pendidikan',
            'name' => 'RIWAYAT PENDIDIKAN '
            ],
            [
            'slug'  => 'pelatihan-profesional',
            'name' => 'PELATIHAN PROFESIONAL'
            ],
            [
            'slug'  => 'seminar',
            'name' => 'KONFERENSI/SEMINAR/LOKAKARYA/SIMPOSIUM'
            ],
            [
            'slug'  => 'penghargaan',
            'name' => 'PENGHARGAAN/PIAGAM'
            ],
            [
            'slug'  => 'organisasi',
            'name' => 'ORGANISASI PROFESI/ILMIAH'
            ],
            [
            'slug'  => 'pengalaman-kerja',
            'name' => 'DAFTAR RIWAYAT PEKERJAAN/PENGALAMAN KERJA'
            ],
        ]);
    }
}
