<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_equipos', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('id_persona')->references('id')->on('persona');
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
        Schema::dropIfExists('persona_equipos');
    }
}
