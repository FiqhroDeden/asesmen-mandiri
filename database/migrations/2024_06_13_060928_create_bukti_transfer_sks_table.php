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
        Schema::create('bukti_transfer_sks', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('transfer_sks_id');
            $table->unsignedInteger('bukti_pendukung_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_transfer_sks');
    }
};
