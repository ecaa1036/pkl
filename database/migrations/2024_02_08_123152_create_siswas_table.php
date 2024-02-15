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
        Schema::create('siswas', function (Blueprint $table) {
            $table->string('nisn',20);
            $table->string('nama');
            $table->string('nohp');
            $table->text('alamat');
            $table->primary('nisn');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_kelas');
            $table->foreign('id_user')->references('id_user')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
