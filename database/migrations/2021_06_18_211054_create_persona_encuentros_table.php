<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaEncuentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_encuentros', function (Blueprint $table) {
            $table->foreignId('persona_id')->references('id')->on('personas');
            $table->foreignId('encuentro_id')->references('id')->on('encuentros');
            $table->enum('tipo_observacion',['Gol','Amonestación','Expulsión','Autogol','Lesión','Cambio']);
            $table->string('observacion');
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
        Schema::dropIfExists('persona_encuentros');
    }
}
