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
        Schema::create('nilai_perolehan_sks', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('formulir_aplikasi_rpl_id');
            $table->unsignedInteger('user_id');
            $table->string('nilai');
            $table->integer('skor');
            $table->boolean('is_permanen')->default(false);
            $table->boolean('is_lulus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_perolehan_sks');
    }
};
