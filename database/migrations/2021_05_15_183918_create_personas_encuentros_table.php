<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasEncuentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_encuentros', function (Blueprint $table) {
            $table->foreignId('persona_id')->references('id')->on('personas');
            $table->foreignId('encuentro_id')->references('id')->on('encuentros');
            $table->enum('observacion_tipo',['Gol','Amonestación','Expulsión','Lesión','Cambio Entrada','Cambio Salida','AutoGol']);
            $table->time('minuto');
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
        Schema::dropIfExists('personas_encuentros');
    }
}
