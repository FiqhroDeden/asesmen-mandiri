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
        Schema::create('riwayat_hidups', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('no_peserta');
            $table->unsignedInteger('riwayat_hidup_form_id');
            $table->unsignedInteger('riwayat_hidup_form_field_id');
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_hidups');
    }
};
