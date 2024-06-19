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
        Schema::create('asesmen_prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('no_peserta');
            $table->string('kode_prodi');
            $table->string('kurikulum');
            $table->string('jurusan')->nullable();

            $semesters = ['1', '2', '3', '4', '5', '6'];
            $coreSubjects = ['bahasa_indonesia', 'bahasa_inggris', 'matematika'];

            foreach ($semesters as $semester) {
                foreach ($coreSubjects as $subject) {
                    $table->string("semester_{$semester}_{$subject}")->nullable();
                }

                if (in_array($semester, ['1', '2'])) {
                    $table->string("semester_{$semester}_ipa")->nullable();
                    $table->string("semester_{$semester}_ips")->nullable();
                }

                if (in_array($semester, ['3', '4', '5', '6'])) {
                    $table->string("semester_{$semester}_mapel_pendukung")->nullable();
                }
            }

            $table->boolean('is_permanen')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asesmen_prestasis');
    }
};
