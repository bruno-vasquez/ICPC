<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Competencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->date('fechaIni');
            $table->date('fechaFin');
            $table->string('requisitos');
            $table->string('encargado');
            $table->string('email');
            $table->string('lugar');
            $table->string('costo');
            $table->string('horarios')->nullable();
            $table->string('estado');
            $table->string('umss');
            $table->string('reporte')->nullable();
            $table->string('imagen')->nullable();
            $table->foreignId('id_tipoCompetencias')->unsigned()->references('id')->on('tipo_competencias')->onDelete("cascade");
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
        Schema::dropIfExists('competencias');

    }
}
