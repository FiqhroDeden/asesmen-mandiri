<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('no_peserta')->unique();
            $table->string('jalur_pendaftaran');
            $table->string('prodi_pilihan');
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('status_perkawinan');
            $table->string('agama');
            $table->string('no_hp');
            $table->string('email');
            $table->string('alamat');
            $table->string('kode_pos');
            $table->string('kebangsaan');
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('nama_pt')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('foto')->nullable();
            $table->string('tempat_kerja')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('status_pekerja')->nullable();
            $table->string('alamat_tempat_kerja')->nullable();
            $table->string('telp_faks')->nullable();
            $table->string('nama_pt')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('foto')->nullable();
            $table->string('file_form2')->nullable();
            $table->string('file_form3')->nullable();
            $table->string('file_form7')->nullable();
            $table->integer('claim_by')->nullable();
            $table->boolean('is_permanen')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
