<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('viaje', function (Blueprint $table) {

            $table->id('idViaje');
            $table->unsignedBigInteger('idRuta');
            $table->unsignedBigInteger('idEstadoConfirmacion');
            $table->string('puntoDeLlegada');
            $table->string('puntoDePartida');
            $table->timestamps();

            $table->foreign('idEstadoConfirmacion')->references('idEstadoConfirmacion')->on('estadoConfirmacion')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idRuta')->references('idRuta')->on('ruta')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('viaje');
    }
};
