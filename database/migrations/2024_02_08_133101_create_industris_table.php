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
        Schema::create('industris', function (Blueprint $table) {
            $table->increments('id_industri');
            $table->string('nama_industri');
            $table->string('pemilik_industri');
            $table->string('alamat_industri');
            $table->string('nohp_industri');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industris');
    }
};
