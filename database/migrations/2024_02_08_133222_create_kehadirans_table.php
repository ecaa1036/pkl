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
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->increments('id_kehadiran');
            $table->date('tgl_kehadiran');
            $table->time('waktu_masuk');
            $table->time('waktu_pulang')->nullable()->change();;
            $table->string('token_masuk');
            $table->string('token_keluar')->nullable()->change();;
            $table->string('nisn');
            // $table->unsignedInteger('id_industri');
            $table->foreign('nisn')->references('nisn')->on('siswas')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreign('id_industri')->references('id_industri')->on('industris')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadirans');
    }
};
