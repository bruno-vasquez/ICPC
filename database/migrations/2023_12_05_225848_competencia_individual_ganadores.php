<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompetenciaIndividualGanadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // database/migrations/YYYY_MM_DD_create_competition_user_table.php
    Schema::create('competencia_individual_ganadores', function (Blueprint $table) {
        /*
    $table->unsignedBigInteger('competencia_id');
    $table->unsignedBigInteger('participante_id1');
    $table->unsignedBigInteger('participante_id2');
    $table->unsignedBigInteger('participante_id3');

    $table->timestamps();

    $table->primary(['competencia_id', 'participante_id1', 'participante_id2', 'participante_id3']);

    $table->foreign('competencia_id')->references('id')->on('competencias')->onDelete('cascade');
    $table->foreign('participante_id1')->references('id')->on('participantes')->onDelete('cascade');
    $table->foreign('participante_id2')->references('id')->on('participantes')->onDelete('cascade');
    $table->foreign('participante_id3')->references('id')->on('participantes')->onDelete('cascade');
*/
    $table->id();

            $table->unsignedBigInteger('competencia_id');
            $table->unsignedBigInteger('participante_id1');
            $table->unsignedBigInteger('participante_id2');
            $table->unsignedBigInteger('participante_id3');

            $table->timestamps();

            $table->foreign('competencia_id')->references('id')->on('competencias')->onDelete('cascade');
            $table->foreign('participante_id1')->references('id')->on('participantes')->onDelete('cascade');
            $table->foreign('participante_id2')->references('id')->on('participantes')->onDelete('cascade');
            $table->foreign('participante_id3')->references('id')->on('participantes')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competencia_individual_ganadores');
    }
}
