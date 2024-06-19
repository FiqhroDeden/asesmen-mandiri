<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelPendukungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mapel_pendukungs')->insert([
            [
                'kode_prodi'    => '74201',
                'kode_snpmb'    => '811038',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Sosiologi / Pendidikan Pancasila',
            ],
            [
                'kode_prodi'    => '74201',
                'kode_snpmb'    => '811038',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '74201',
                'kode_snpmb'    => '811038',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Sosiologi / PPKn',
            ],
            [
                'kode_prodi'    => '74201',
                'kode_snpmb'    => '811038',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Sosiologi / PPKn',
            ],
            [
                'kode_prodi'    => '74201',
                'kode_snpmb'    => '811038',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '74201',
                'kode_snpmb'    => '811038',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '63201',
                'kode_snpmb'    => '811039',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Sosiologi / Pendidikan Pancasila',
            ],
            [
                'kode_prodi'    => '63201',
                'kode_snpmb'    => '811039',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '63201',
                'kode_snpmb'    => '811039',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Sosiologi / PPKn',
            ],
            [
                'kode_prodi'    => '63201',
                'kode_snpmb'    => '811039',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Sosiologi / PPKn',
            ],
            [
                'kode_prodi'    => '63201',
                'kode_snpmb'    => '811039',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '63201',
                'kode_snpmb'    => '811039',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'PPKn',
            ],
        ]);
    }
}
