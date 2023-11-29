<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventoInteresados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // database/migrations/YYYY_MM_DD_create_competition_user_table.php
    Schema::create('evento_interesados', function (Blueprint $table) {
    $table->unsignedBigInteger('evento_id');
    $table->unsignedBigInteger('interesado_id');
    $table->timestamps();

    $table->primary(['evento_id', 'interesado_id']);

    $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
    $table->foreign('interesado_id')->references('id')->on('interesados')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_interesados');
    }
}
