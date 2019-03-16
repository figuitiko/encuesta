<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestaPreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_pregunta', function (Blueprint $table) {
            $table->primary('encuesta_id', 'pregunta_id');
            $table->unsignedInteger('encuesta_id');
            $table->unsignedInteger('pregunta_id');
            $table->timestamps();
            $table->foreign('encuesta_id')->references('id')->on('encuestas')->onDelete('cascade');
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta_pregunta');
    }
}
