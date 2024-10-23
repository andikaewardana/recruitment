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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jobs');
<<<<<<< HEAD
            $table->json('nilai_pelamar');
            $table->double('nilai_akhir')->nullable();
            // $table->text('masalah');
            // $table->text('solusi')->nullable();
            // $table->string('user');
            // $table->integer('status');
            // $table->string('engineer');
=======
            $table->string('nama_pelamar');
            $table->string('data_pelamar');
            $table->string('pendidikan');
            $table->string('pengalaman_kerja');
            $table->string('wawancara');
            $table->string('test_skill');
            $table->string('psikotest');
            $table->double('nilai_akhir')->nullable();
>>>>>>> 2e08166689e9868067b5dead7608251d37583eba
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
