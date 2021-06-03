<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuentros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_local_id')->references('id')->on('equipos');
            $table->foreignId('equipo_visitante_id')->references('id')->on('equipos');
            $table->foreignId('sede_id')->references('id')->on('sedes');
            $table->longText('observaciones');
            $table->datetime('fecha_hora');
            $table->string('resultado');
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
        Schema::dropIfExists('encuentros');
    }
}
