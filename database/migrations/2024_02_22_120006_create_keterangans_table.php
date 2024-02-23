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
        Schema::create('keterangans', function (Blueprint $table) {
            $table->increments('id_ket');
            $table->string('ket');
            $table->enum('status', ['ijin','sakit', 'alfa']);
            $table->string('nisn');
            // $table->unsignedInteger('id_kehadiran');
            // $table->foreign('id_kehadiran')->references('id_kehadiran')->on('kehadirans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('nisn')->references('nisn')->on('siswas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keterangans');
    }
};
