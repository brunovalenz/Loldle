<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('especies_campeoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('especies_idespecies');
            $table->unsignedInteger('campeoes_idcampeoes');
            $table->timestamps();

            $table->foreign('especies_idespecies')->references('id')->on('especies')->onDelete('cascade');
            $table->foreign('campeoes_idcampeoes')->references('id')->on('campeoes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('especies_campeoes');
    }
};
