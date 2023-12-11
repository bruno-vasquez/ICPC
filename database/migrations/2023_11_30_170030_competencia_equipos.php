<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompetenciaEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // database/migrations/YYYY_MM_DD_create_competition_user_table.php
    Schema::create('competencia_equipos', function (Blueprint $table) {
    $table->unsignedBigInteger('competencia_id');
    $table->unsignedBigInteger('equipo_id');
    $table->timestamps();

    $table->primary(['competencia_id', 'equipo_id']);

    $table->foreign('competencia_id')->references('id')->on('competencias')->onDelete('cascade');
    $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competencia_participantes');
    }
}
