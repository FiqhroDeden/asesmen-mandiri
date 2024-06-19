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
        Schema::create('perolehan_sks', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('formulir_aplikasi_rpl_id');
            $table->unsignedInteger('cpm_id');
            $table->string('status_ketrampilan');
            $table->string('bukti_pendukung_id')->nullable();
            $table->boolean('is_valid')->default(false);
            $table->boolean('is_autentik')->default(false);
            $table->boolean('is_terkini')->default(false);
            $table->boolean('is_memadai')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perolehan_sks');
    }
};
