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
        Schema::create('aktivitas', function (Blueprint $table) {
            $table->increments('id_aktivitas');
            $table->text('deskripsi');
            $table->text('foto');
            $table->time('durasi');
            $table->unsignedInteger('id_kehadiran');
            $table->foreign('id_kehadiran')->references('id_kehadiran')->on('kehadirans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas');
    }
};
