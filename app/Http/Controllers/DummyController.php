<?php

namespace App\Http\Controllers;

use App\Models\DummyPeserta;
use App\Models\User;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DummyController extends Controller
{
    public function makeDummy()
{
    DB::beginTransaction();

    try {
        $dataPeserta = DummyPeserta::all();

        foreach ($dataPeserta as $peserta) {
            // Create User
            $user = new User([
                'username' => $peserta->no_peserta,
                'name' => fake()->name,
                'email' => fake()->email,
                'role' => 'peserta',
                'prodi' => $peserta->prodi_pilihan,
                'no_peserta' => $peserta->no_peserta,
                'password' => bcrypt($peserta->no_peserta),
            ]);
            $user->save();

            // Create Peserta Biodata
            $biodata = new Peserta([
                'no_peserta' => $peserta->no_peserta,
                'jalur_pendaftaran' => 53,
                'prodi_pilihan' => $peserta->prodi_pilihan,
                'nik' => $peserta->no_peserta,
                'nama' => fake()->name,
                'tempat_lahir' => fake()->city,
                'tanggal_lahir' => '2005-09-10',
                'jenis_kelamin' => 'Laki-Laki',
                'status_perkawinan' => '',
                'agama' => '',
                'no_hp' => fake()->e164PhoneNumber,
                'email' => fake()->email,
                'alamat' => fake()->streetAddress,
                'kode_pos' => fake()->postcode,
                'kebangsaan' => 'Indonesia',
                'foto' => 'storage/foto/T2G6S8x5SJT6PrDrvLOIomIhyzdwShFEBP93PVls.jpg',
            ]);
            $biodata->save();
        }

        DB::commit();

        return 'SUCCESS';

    } catch (\Exception $e) {
        DB::rollback();
        Log::error($e);
        return 'ERROR: ' . $e->getMessage();
    }
}

}
