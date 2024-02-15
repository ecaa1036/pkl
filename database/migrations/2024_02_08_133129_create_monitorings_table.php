<?php

use App\Models\Industri;
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
        Schema::create('monitorings', function (Blueprint $table) {
            $table->increments('id_monitoring');
            $table->unsignedInteger('id_industri');
            $table->string('nisn');
            $table->unsignedInteger('id_guru');
            $table->foreign('id_industri')->references('id_industri')->on('industris')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('nisn')->references('nisn')->on('siswas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_guru')->references('id_guru')->on('gurus')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitorings');
    }
};
