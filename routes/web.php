<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DownloadFileController;


Route::middleware('guest')->group(function (){
    Route::controller(AuthController::class)->group(function (){
        Route::get('login', 'login')->name('login');
        Route::post('login', 'authenticate')->name('login');
        Route::get('/sso/redirect', 'ssoRedirect')->name('sso.redirect');
        Route::get('/sso/callback', 'ssoCallback')->name('sso.callback');
        Route::get('/sso/connect-user', 'ssoConnectUser')->name('sso.connect-user');
    });
});
Route::middleware('auth')->group(function (){
    ROute::middleware('role:admin,kaprodi,asesor,kaprodi-asesor')->group(function (){
        Route::get('/', App\Livewire\Dashboard::class)->name('dashboard');
        Route::get('/dashboard', App\Livewire\Dashboard::class)->name('dashboard');
    });
    Route::middleware('role:admin')->group(function(){
        Route::get('/peserta-prestasi', App\Livewire\PesertaPrestasi\Index::class)->name('peserta-prestasi');
        Route::get('/peserta-prestasi/{no_peserta}/detail', App\Livewire\PesertaPrestasi\Detail::class)->name('peserta-prestasi.detail');
        Route::get('/peserta-prestasi/{no_peserta}/asesmen', App\Livewire\PesertaPrestasi\Asesmen::class)->name('peserta-prestasi.asesmen');
    });

    Route::middleware('role:peserta')->group(function (){
        Route::get('/biodata', App\Livewire\Biodata::class)->name('biodata');
        /** RPL Routes */
        Route::get('/hasil-penilaian', App\Livewire\HasilPenilaian::class)->name('hasil-penilaian');
        Route::get('/download-form-2', [DownloadFileController::class, 'downloadForm2'])->name('download.form-2');
        Route::get('/download-form-3', [DownloadFileController::class, 'downloadForm3'])->name('download.form-3');
        Route::get('/download-form-7', [DownloadFileController::class, 'downloadForm7'])->name('download.form-7');


        Route::get('/formulir-aplikasi-rpl', App\Livewire\FormulirAplikasiRpl\Index::class)->name('formulir-aplikasi-rpl');
        Route::get('/upload-bukti-pendukung', App\Livewire\BuktiPendukung\Index::class)->name('bukti-pendukung');
        Route::get('/formulir-evaluasi-diri', App\Livewire\FormulirEvaluasiDiri\Index::class)->name('formulir-evaluasi-diri');
        Route::get('/formulir-riwayat-hidup', App\Livewire\FormulirRiwayatHidup\Index::class)->name('formulir-riwayat-hidup');

        /** Prestasi Routes */
        Route::get('/asesmen-prestasi', App\Livewire\AsesmenPrestasi\Index::class)->name('asesmen-prestasi');
    });
    /** Peserta Routes */
    Route::middleware('role:kaprodi,kaprodi-asesor')->group(function(){

        /** Mata Kuliah Routes */
        Route::get('/matakuliah', App\Livewire\Matakuliah\Index::class)->name('matakuliah');

    });

    Route::middleware('role:asesor,kaprodi-asesor')->group(function(){

        /** ASesor Routes */
        Route::get('/peserta', App\Livewire\Peserta::class)->name('peserta');
        Route::get('/pakta-integritas', App\Livewire\PaktaIntegritas\Index::class)->name('pakta-integritas');
        Route::get('/download-pakta-integritas', [DownloadFileController::class, 'downloadPaktaIntegritas'])->name('download.pakta-integritas');
        Route::get('/peserta-rpl', App\Livewire\PesertaRpl\Index::class)->name('peserta-rpl');
        Route::get('/peserta-rpl/{no_peserta}/asesmen', App\Livewire\PesertaRpl\Asesmen::class)->name('peserta-rpl.asesmen');
        Route::get('/peserta-rpl/{no_peserta}/detail', App\Livewire\PesertaRpl\Detail::class)->name('peserta-rpl.detail');
        Route::get('/download-berita-acara/{no_peserta}', [DownloadFileController::class, 'beritaAcara'])->name('download.berita-acara');

   });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

