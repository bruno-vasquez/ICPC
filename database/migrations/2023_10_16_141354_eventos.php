<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Eventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('email');
            $table->date('fechaIni');
            $table->date('fechaFin');
            $table->string('requisitos');
            $table->string('encargado');
            $table->string('lugar');
            $table->string('estado');
            $table->string('costo');
            $table->string('horarios')->nullable();
            $table->string('imagen')-> nullable();
            $table->foreignId('id_tipoEventos')->unsigned()->references('id')->on('tipo_eventos')->onDelete("cascade");
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
        Schema::dropIfExists('eventos');
    }
}
