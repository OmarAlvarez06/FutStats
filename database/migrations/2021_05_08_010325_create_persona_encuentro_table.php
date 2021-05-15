<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaEncuentroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_encuentro', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('id_persona')->references('id')->on('persona');
            $table->foreignId('id_encuentro')->references('id')->on('encuentro');
            $table->enum('tipo_observacion',['Gol','Amonestación','Expulsión','Lesión','Cambio Entrada','Cambio Salida','AutoGol']);
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
        Schema::dropIfExists('persona_encuentro');
    }
}
