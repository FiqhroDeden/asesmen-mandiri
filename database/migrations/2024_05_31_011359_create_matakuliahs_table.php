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
            $table->string('tahun_berlaku');
            $table->string('kode');
            $table->string('nama');
            $table->string('kurikulum')->nullable();
            $table->string('semester');
            $table->integer('sks');
            $table->text('uraian')->nullable();
            $table->boolean('is_wajib')->default(false);
            $table->string('nilai_bobot_min_lulus');
            $table->string('nilai_huruf_min_lulus');
            $table->string('nilai_angka_batas_bawah');
            $table->string('nilai_angka_batas_atas');
            $table->boolean('is_rpl')->default(false);
            $table->timestamps();
        });
    }
    // insert into matakuliahs(kode_prodi,tahun_berlaku,kode,nama,kurikulum,semester,sks,uraian,is_wajib,nilai_bobot_min_lulus,nilai_huruf_min_lulus,nilai_angka_batas_bawah,nilai_angka_batas_atas,is_rpl) values('

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliahs');
    }
};
