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
        Schema::create('campeoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->binary('imagem');
            $table->string('genero',100);
            $table->integer('ano');
            /*$table->unsignedInteger('recursos_idrecursos');*/
            $table->unsignedInteger('alcances_idalcances');
            $table->timestamps();

            /*$table->foreign('recursos_idrecursos')->references('id')->on('recursos')->onDelete('cascade');*/
            $table->foreign('alcances_idalcances')->references('id')->on('alcances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campeoes');
    }
};
