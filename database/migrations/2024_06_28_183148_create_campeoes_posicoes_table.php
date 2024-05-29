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
        Schema::create('campeoes_posicoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('campeoes_idcampeoes');
            $table->unsignedInteger('posicoes_idposicoes');
            $table->timestamps();

            $table->foreign('campeoes_idcampeoes')->references('id')->on('campeoes')->onDelete('cascade');
            $table->foreign('posicoes_idposicoes')->references('id')->on('posicoes')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campeoes_posicoes');
    }
};
