<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompIndividualGanadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('comp_individual_ganadores', function (Blueprint $table) {
        
            $table->unsignedBigInteger('competencia_id');
            $table->unsignedBigInteger('participante_id');
            $table->timestamps();
        
            $table->primary(['competencia_id', 'participante_id']);
        
            $table->foreign('competencia_id')->references('id')->on('competencias')->onDelete('cascade');
            $table->foreign('participante_id')->references('id')->on('participantes')->onDelete('cascade');        
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comp_individual_ganadores');
    }
}
