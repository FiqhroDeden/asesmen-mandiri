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
        Schema::create('transfer_sks', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('formulir_aplikasi_rpl_id');
            $table->string('nama_matakuliah_asal');
            $table->string('sks_matakuliah_asal');
            $table->string('nilai_matakuliah_asal');
            $table->unsignedInteger('bukti_pendukung_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_sks');
    }
};
