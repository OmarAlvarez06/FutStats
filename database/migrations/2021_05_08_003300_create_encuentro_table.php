<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuentroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuentro', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_equipo_local')->references('id')->on('equipos');
            $table->foreignId('id_equipo_visitante')->references('id')->on('equipos');
            $table->foreignId('id_observaciones')->references('id')->on('observaciones');
            $table->string('sede');
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
        Schema::dropIfExists('encuentro');
    }
}
