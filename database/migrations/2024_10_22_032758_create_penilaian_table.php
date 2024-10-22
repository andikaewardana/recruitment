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
            $table->json('nilai_pelamar');
            $table->double('nilai_akhir')->nullable();
            // $table->text('masalah');
            // $table->text('solusi')->nullable();
            // $table->string('user');
            // $table->integer('status');
            // $table->string('engineer');
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
