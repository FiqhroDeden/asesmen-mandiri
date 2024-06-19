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
        Schema::create('formulir_aplikasi_rpls', function (Blueprint $table) {
            $table->id();
            $table->string('no_peserta');
            $table->string('matakuliah_id');
            $table->boolean('is_permanen')->default(false);
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir_aplikasi_rpls');
    }
};
