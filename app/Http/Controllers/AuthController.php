<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => "Login | Asesmen Mandiri Unpatti"
        ]);
    }


    public function authenticate(Request $request)
    {
        $request->validate([
            'nik'   => 'required',
            'password'=> 'required',
        ]);

        $user = User::where('username', $request->nik)->first();
        if($user){
            Auth::login($user);
            return redirect()->route('biodata');
        }else{
            DB::beginTransaction();
            try {
                $response = Http::post('https://mandiri.pmb.unpatti.ac.id/api/connect-user', [
                    'nik'   => $request->nik,
                    'password'   => $request->password,
                ])->json();

                if($response['success']){
                    $peserta = $response['data'];

                    $checkPeserta = User::where('no_peserta', $peserta['no_peserta'])->first();
                    if($checkPeserta){
                        return redirect()->back()->with('error', 'Login gagal, No Peserta anda sudah terdaftar, silahkan menghubungi Pusdatin');
                    }

                    $user = new User();
                    $user->username = $peserta['nik'];
                    $user->name = $peserta['nama'];
                    $user->email = $peserta['email'];
                    $user->role = 'peserta';
                    $user->prodi = $peserta['prodi_pilihan'];
                    $user->no_peserta = $peserta['no_peserta'];
                    $user->password = bcrypt($peserta['password_default']);
                    $user->save();


                    $biodata = new Peserta();
                    $biodata->no_peserta = $peserta['no_peserta'];
                    $biodata->jalur_pendaftaran = $peserta['jalur_pendaftaran'];
                    $biodata->prodi_pilihan = $peserta['prodi_pilihan'];
                    $biodata->nik = $peserta['nik'];
                    $biodata->nama = $peserta['nama'];
                    $biodata->tempat_lahir = $peserta['tempat_lahir'];
                    $biodata->tanggal_lahir = $peserta['tanggal_lahir'];
                    $biodata->jenis_kelamin = $peserta['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan';
                    $biodata->status_perkawinan = '';
                    $biodata->agama = '';
                    $biodata->no_hp = $peserta['no_hp'];
                    $biodata->email = $peserta['email'];
                    $biodata->alamat = $peserta['alamat'];
                    $biodata->kode_pos = $peserta['kode_pos'];
                    $biodata->kebangsaan = $peserta['id_negara'] == 'IDN' ? 'Indonesia' : '';
                    $biodata->foto = $peserta['path_foto'];
                    $biodata->save();

                    DB::commit();

                    Auth::login($user);
                    return redirect()->route('biodata');
                }else{
                    flash()->error('Login Gagal, Peserta tidak ditemukan');
                    return redirect()->back()->with('error', 'Login Gagal, Peserta tidak ditemukan');
                }
            } catch (\Exception $e) {
                DB::rollback();
                Log::error($e);
                // Return a user-friendly error message
                flash()->error('Terjadi Kesalahan Sistem'. $e->getMessage());
                return redirect()->back();
            }

        }


    }
    public function ssoRedirect(Request $request)
    {
        $request->session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => '9c29b76f-023e-4978-9183-fc098e1d7712',
            'redirect_uri' => '	http://asesmen-mandiri.test/sso/callback',
            'response_type' => 'code',
            'scope' => 'view-user',
            'state' => $state,
            // 'prompt' => '', // "none", "consent", or "login"
        ]);


        return redirect('https://sso.unpatti.ac.id/oauth/authorize?' . $query);
    }

    public function ssoCallback(Request $request)
    {
        // dd($request->session()->pull('state'));
        $state = $request->session()->pull('state');

        throw_unless(
            strlen($state) > 0 && $state === $request->state,
            InvalidArgumentException::class,
            'Invalid state value.'
        );

        $response = Http::asForm()->post('https://sso.unpatti.ac.id/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => '9c29b76f-023e-4978-9183-fc098e1d7712',
            'client_secret' => 'n3V0KyGeYYoTpdz18urO6rUsz2enZDTwt4DKuead',
            'redirect_uri' => '	http://asesmen-mandiri.test/sso/callback',
            'code' => $request->code,
        ]);
        $request->session()->put($response->json());
        // return $response->json();
        return redirect()->route('sso.connect-user');
    }
    public function ssoConnectUser(Request $request)
    {
        $access_token = $request->session()->get('access_token');
        // dd($access_token);
        $response = Http::withHeaders([
            "Accept"    => "application/json",
            'Authorization' => 'Bearer ' . $access_token
        ])->get('https://sso.unpatti.ac.id/api/user');
        $userArray = $response->json();
        // dd($userArray);
        $permission = false;
        $is_admin = false;

        if ($userArray['is_admin']) {
            $permission = true;
            $is_admin = true;
        } else {
            foreach ($userArray['user_roles'] as $userRoles) {
                $roleCode = $userRoles['role']['code'];
                if ($roleCode === 'kaprodi') {
                    $roleName = $userRoles['role']['code'];
                    $work_division = $userRoles['work_division']['code'];
                    $permission = true;
                    $is_admin = false;
                    break;
                }
                if ($roleCode === 'asesor-mandiri') {
                    $roleName = 'asesor';
                    $work_division = $userRoles['work_division']['code'];
                    $permission = true;
                    $is_admin = false;
                    break;
                }
            }
        }

        if (!$permission) {
            return redirect()->route('login')->with('error', 'Akun anda tidak memiliki akses ke Asesmen Mandiri');
        }

        try {
            $username = $userArray['username'];
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Failed to get login information! Try Again');
        }

        $user = User::firstOrCreate(
            ['username' => $username],
            [
                'name' => $userArray['name'],
                'email' => $userArray['email'],
                'role' => $is_admin ? 'admin' : ($roleName ?? ''),
                'prodi' => $is_admin ? null : ($work_division ?? ''),
            ]
        );

        Auth::login($user);
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        // send a revoke tokens request to sso server
        $access_token = session()->get('access_token');
        // dd($access_token);
        if(Auth::user()->role !=='peserta'){
            Http::withHeaders([
                "Accept"    => "application/json",
                'Authorization' => 'Bearer ' . $access_token
            ])->get('https://sso.unpatti.ac.id/api/logmeout');
        }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
