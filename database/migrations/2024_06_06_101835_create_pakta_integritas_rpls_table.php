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
        Schema::create('pakta_integritas_rpls', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('jabatan_fungsional');
            $table->string('nik');
            $table->string('nip');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('email');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('bidang_keilmuan')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('keanggotan_asosiasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakta_integritas_rpls');
    }
};
