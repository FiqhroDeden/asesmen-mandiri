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
        Schema::create('berita_acara_asesmens', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('prodi');
            $table->string('no_peserta');
            $table->integer('total_sks_diakui');
            $table->integer('total_sks_harus_ditempuh');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_acara_asesmens');
    }
};
