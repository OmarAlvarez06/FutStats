<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_equipos', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('id_persona')->references('id')->on('personas');
            $table->foreignId('id_equipo')->references('id')->on('equipos');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_cierre');
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
        Schema::dropIfExists('personas_equipos');
    }
}
