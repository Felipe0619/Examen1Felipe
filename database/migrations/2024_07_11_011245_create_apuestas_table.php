<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApuestasTable extends Migration
{
    public function up()
    {
        Schema::create('apuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_juego');
            $table->foreign('id_juego')->references('id')->on('juegos');
            $table->dateTime('fecha');
            $table->integer('monto');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apuestas');
    }
}
