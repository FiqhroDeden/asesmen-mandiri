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
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_prodi');
            $table->string('tahun_berlaku')->nullable();
            $table->string('kode')->nullable();
            $table->string('nama')->nullable();
            $table->string('kurikulum')->nullable();
            $table->string('semester')->nullable();
            $table->integer('sks')->nullable();
            $table->text('uraian')->nullable();
            $table->boolean('is_wajib')->default(false);
            $table->string('nilai_bobot_min_lulus')->nullable();
            $table->string('nilai_huruf_min_lulus')->nullable();
            $table->string('nilai_angka_batas_bawah')->nullable();
            $table->string('nilai_angka_batas_atas')->nullable();
            $table->boolean('is_rpl')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliahs');
    }
};
