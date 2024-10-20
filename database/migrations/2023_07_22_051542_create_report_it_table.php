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
        Schema::create('report_it', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('jenis');
            $table->text('masalah');
            $table->text('solusi')->nullable();
            $table->string('user');
            $table->integer('status');
            $table->string('engineer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_it');
    }
};
