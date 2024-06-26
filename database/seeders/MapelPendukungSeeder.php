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
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '74201',
                'kode_snpmb'    => '811038',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'PPKn',
            ],
            // Batas
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
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '63201',
                'kode_snpmb'    => '811039',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'PPKn',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '65201',
                'kode_snpmb'    => '811040',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Sosiologi / Pendidikan Pancasila',
            ],
            [
                'kode_prodi'    => '65201',
                'kode_snpmb'    => '811040',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '65201',
                'kode_snpmb'    => '811040',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Sosiologi / PPKn',
            ],
            [
                'kode_prodi'    => '65201',
                'kode_snpmb'    => '811040',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '65201',
                'kode_snpmb'    => '811040',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'PPKn',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '69201',
                'kode_snpmb'    => '811041',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Sosiologi',
            ],
            [
                'kode_prodi'    => '69201',
                'kode_snpmb'    => '811041',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Sejarah Indonesia',
            ],
            [
                'kode_prodi'    => '69201',
                'kode_snpmb'    => '811041',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Sosiologi',
            ],
            [
                'kode_prodi'    => '69201',
                'kode_snpmb'    => '811041',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Antropologi',
            ],
            [
                'kode_prodi'    => '69201',
                'kode_snpmb'    => '811041',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Sejarah / Sosiologi',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '70201',
                'kode_snpmb'    => '811056',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Sosiologi',
            ],
            [
                'kode_prodi'    => '70201',
                'kode_snpmb'    => '811056',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '70201',
                'kode_snpmb'    => '811056',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Sosiologi',
            ],
            [
                'kode_prodi'    => '70201',
                'kode_snpmb'    => '811056',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Antropologi',
            ],
            [
                'kode_prodi'    => '70201',
                'kode_snpmb'    => '811056',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Bahasa Indonesia',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '60201',
                'kode_snpmb'    => '811043',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Ekonomi / Matematika',
            ],
            [
                'kode_prodi'    => '60201',
                'kode_snpmb'    => '811043',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Ekonomi / Matematika',
            ],
            [
                'kode_prodi'    => '60201',
                'kode_snpmb'    => '811043',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Ekonomi',
            ],
            [
                'kode_prodi'    => '60201',
                'kode_snpmb'    => '811043',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '60201',
                'kode_snpmb'    => '811043',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Matematika',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '61201',
                'kode_snpmb'    => '811042',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Ekonomi / Matematika',
            ],
            [
                'kode_prodi'    => '61201',
                'kode_snpmb'    => '811042',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Ekonomi / Matematika',
            ],
            [
                'kode_prodi'    => '61201',
                'kode_snpmb'    => '811042',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Ekonomi',
            ],
            [
                'kode_prodi'    => '61201',
                'kode_snpmb'    => '811042',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '61201',
                'kode_snpmb'    => '811042',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Matematika',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '62201',
                'kode_snpmb'    => '811044',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Ekonomi / Matematika',
            ],
            [
                'kode_prodi'    => '62201',
                'kode_snpmb'    => '811044',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Ekonomi / Matematika',
            ],
            [
                'kode_prodi'    => '62201',
                'kode_snpmb'    => '811044',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Ekonomi',
            ],
            [
                'kode_prodi'    => '62201',
                'kode_snpmb'    => '811044',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '62201',
                'kode_snpmb'    => '811044',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Matematika',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '87201',
                'kode_snpmb'    => '811045',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Sejarah',
            ],
            [
                'kode_prodi'    => '87201',
                'kode_snpmb'    => '811045',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Pendidikan Sejarah',
            ],
            [
                'kode_prodi'    => '87201',
                'kode_snpmb'    => '811045',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Pendidikan Sejarah',
            ],
            [
                'kode_prodi'    => '87201',
                'kode_snpmb'    => '811045',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Pendidikan Sejarah',
            ],
            [
                'kode_prodi'    => '87201',
                'kode_snpmb'    => '811045',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Pendidikan Sejarah',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '87202',
                'kode_snpmb'    => '811046',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Geografi / Matematika',
            ],
            [
                'kode_prodi'    => '87202',
                'kode_snpmb'    => '811046',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Fisika / Matematika',
            ],
            [
                'kode_prodi'    => '87202',
                'kode_snpmb'    => '811046',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Geografi / Matematika',
            ],
            [
                'kode_prodi'    => '87202',
                'kode_snpmb'    => '811046',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '87202',
                'kode_snpmb'    => '811046',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Matematika',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '87205',
                'kode_snpmb'    => '811048',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Pendidikan Pancasila',
            ],
            [
                'kode_prodi'    => '87205',
                'kode_snpmb'    => '811048',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '87205',
                'kode_snpmb'    => '811048',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '87205',
                'kode_snpmb'    => '811048',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'PPKn',
            ],
            [
                'kode_prodi'    => '87205',
                'kode_snpmb'    => '811048',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'PPKn',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '87203',
                'kode_snpmb'    => '811047',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Ekonomi / Matematika',
            ],
            [
                'kode_prodi'    => '87203',
                'kode_snpmb'    => '811047',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Ekonomi / Matematika',
            ],
            [
                'kode_prodi'    => '87203',
                'kode_snpmb'    => '811047',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Ekonomi',
            ],
            [
                'kode_prodi'    => '87203',
                'kode_snpmb'    => '811047',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '87203',
                'kode_snpmb'    => '811047',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Matematika',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '87209',
                'kode_snpmb'    => '811070',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Ekonomi / Matematika',
            ],
            [
                'kode_prodi'    => '87209',
                'kode_snpmb'    => '811070',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Ekonomi / Matematika',
            ],
            [
                'kode_prodi'    => '87209',
                'kode_snpmb'    => '811070',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Ekonomi',
            ],
            [
                'kode_prodi'    => '87209',
                'kode_snpmb'    => '811070',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '87209',
                'kode_snpmb'    => '811070',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Matematika',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '88201',
                'kode_snpmb'    => '811049',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '88201',
                'kode_snpmb'    => '811049',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '88201',
                'kode_snpmb'    => '811049',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '88201',
                'kode_snpmb'    => '811049',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '88201',
                'kode_snpmb'    => '811049',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Bahasa Indonesia',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '88203',
                'kode_snpmb'    => '811050',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Bahasa Inggris',
            ],
            [
                'kode_prodi'    => '88203',
                'kode_snpmb'    => '811050',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Bahasa Inggris',
            ],
            [
                'kode_prodi'    => '88203',
                'kode_snpmb'    => '811050',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Bahasa Inggris',
            ],
            [
                'kode_prodi'    => '88203',
                'kode_snpmb'    => '811050',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Bahasa Inggris',
            ],
            [
                'kode_prodi'    => '88203',
                'kode_snpmb'    => '811050',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Bahasa Inggris',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '88207',
                'kode_snpmb'    => '811051',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Bahasa Jerman / Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '88207',
                'kode_snpmb'    => '811051',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Bahasa Jerman / Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '88207',
                'kode_snpmb'    => '811051',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Bahasa Jerman / Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '88207',
                'kode_snpmb'    => '811051',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Bahasa Jerman / Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '88207',
                'kode_snpmb'    => '811051',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Bahasa Jerman / Bahasa Indonesia',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '85201',
                'kode_snpmb'    => '811052',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Pendidikan Jasmani Olahraga, dan kesehatan (PJOK) / Biologi',
            ],
            [
                'kode_prodi'    => '85201',
                'kode_snpmb'    => '811052',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Pendidikan Jasmani Olahraga, dan kesehatan (PJOK) / Biologi',
            ],
            [
                'kode_prodi'    => '85201',
                'kode_snpmb'    => '811052',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Pendidikan Jasmani Olahraga, dan kesehatan (PJOK)',
            ],
            [
                'kode_prodi'    => '85201',
                'kode_snpmb'    => '811052',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Pendidikan Jasmani Olahraga, dan kesehatan (PJOK)',
            ],
            [
                'kode_prodi'    => '85201',
                'kode_snpmb'    => '811052',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Pendidikan Jasmani Olahraga, dan kesehatan (PJOK)',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '86201',
                'kode_snpmb'    => '811053',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Sosiologi',
            ],
            [
                'kode_prodi'    => '86201',
                'kode_snpmb'    => '811053',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '86201',
                'kode_snpmb'    => '811053',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Sosiologi',
            ],
            [
                'kode_prodi'    => '86201',
                'kode_snpmb'    => '811053',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '86201',
                'kode_snpmb'    => '811053',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Matematika',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '86205',
                'kode_snpmb'    => '811054',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '86205',
                'kode_snpmb'    => '811054',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '86205',
                'kode_snpmb'    => '811054',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '86205',
                'kode_snpmb'    => '811054',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '86205',
                'kode_snpmb'    => '811054',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Bahasa Indonesia',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '86206',
                'kode_snpmb'    => '811055',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '86206',
                'kode_snpmb'    => '811055',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '86206',
                'kode_snpmb'    => '811055',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '86206',
                'kode_snpmb'    => '811055',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Bahasa Indonesia',
            ],
            [
                'kode_prodi'    => '86206',
                'kode_snpmb'    => '811055',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Bahasa Indonesia',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '86204',
                'kode_snpmb'    => '811067',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Ekonomi',
            ],
            [
                'kode_prodi'    => '86204',
                'kode_snpmb'    => '811067',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '86204',
                'kode_snpmb'    => '811067',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Ekonomi',
            ],
            [
                'kode_prodi'    => '86204',
                'kode_snpmb'    => '811067',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '86204',
                'kode_snpmb'    => '811067',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Matematika',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '84205',
                'kode_snpmb'    => '811001',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Biologi',
            ],
            [
                'kode_prodi'    => '84205',
                'kode_snpmb'    => '811001',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Biologi',
            ],
            [
                'kode_prodi'    => '84205',
                'kode_snpmb'    => '811001',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '84205',
                'kode_snpmb'    => '811001',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '84205',
                'kode_snpmb'    => '811001',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Matematika',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '84204',
                'kode_snpmb'    => '811004',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Kimia',
            ],
            [
                'kode_prodi'    => '84204',
                'kode_snpmb'    => '811004',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Kimia',
            ],
            [
                'kode_prodi'    => '84204',
                'kode_snpmb'    => '811004',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '84204',
                'kode_snpmb'    => '811004',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '84204',
                'kode_snpmb'    => '811004',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Matematika',
            ],
            // Batas Bawah
            [
                'kode_prodi'    => '84202',
                'kode_snpmb'    => '811003',
                'kurikulum'    => 'merdeka',
                'jurusan'    => '',
                'nama'    => 'Matematika Tingkat Lanjut',
            ],
            [
                'kode_prodi'    => '84202',
                'kode_snpmb'    => '811003',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '84202',
                'kode_snpmb'    => '811003',
                'kurikulum'    => '2013',
                'jurusan'    => 'IPS',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '84202',
                'kode_snpmb'    => '811003',
                'kurikulum'    => '2013',
                'jurusan'    => 'BAHASA',
                'nama'    => 'Matematika',
            ],
            [
                'kode_prodi'    => '84202',
                'kode_snpmb'    => '811003',
                'kurikulum'    => '2013',
                'jurusan'    => 'KEJURUAN',
                'nama'    => 'Matematika',
            ],
            // Batas Bawah
        ]);
    }
}
