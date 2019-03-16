<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntaRespuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_respuesta', function (Blueprint $table) {
            $table->primary('pregunta_id','respuesta_id');
            $table->unsignedInteger('pregunta_id');
            $table->unsignedInteger('respuesta_id');
            $table->timestamps();
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');
            $table->foreign('respuesta_id')->references('id')->on('respuestas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregunta_respuesta');
    }
}
