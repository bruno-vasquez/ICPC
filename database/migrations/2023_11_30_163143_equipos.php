<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Equipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreEquipo');

            $table->string('nombreCoach');
            $table->integer('edadCoach');
            $table->string('carreraCoach');
            $table->integer('codSISCoach')->nullable();
            $table->string('emailCoach');
            $table->integer('numeroCoach');
            $table->string('universidadCoach');
            $table->integer('semestreCoach');

            $table->string('nombre1');
            $table->integer('edad1');
            $table->string('carrera1');
            $table->integer('codSIS1')->nullable();
            $table->string('universidad1');
        
            $table->string('nombre2');
            $table->integer('edad2');
            $table->string('carrera2');
            $table->string('codSIS2')->nullable();
            $table->string('universidad2');

            $table->string('nombre3')->nullable();
            $table->integer('edad3')->nullable();
            $table->string('carrera3')->nullable();
            $table->integer('codSIS3')->nullable();
            $table->string('universidad3')->nullable();

            $table->string('nombre4')->nullable();
            $table->integer('edad4')->nullable();
            $table->string('carrera4')->nullable();
            $table->integer('codSIS4')->nullable();
            $table->string('universidad4')->nullable();

            $table->string('nombre5')->nullable();
            $table->integer('edad5')->nullable();
            $table->string('carrera5')->nullable();
            $table->integer('codSIS5')->nullable();
            $table->string('universidad5')->nullable();

            $table->string('nombre6')->nullable();
            $table->integer('edad6')->nullable();
            $table->string('carrera6')->nullable();
            $table->integer('codSIS6')->nullable();
            $table->string('universidad6')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}