<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pago', function (Blueprint $table) {

            $table->id('idPago');
            $table->unsignedBigInteger('idViaje');
            $table->unsignedBigInteger('idTipoPago');
            $table->integer('montoTotal');
            $table->timestamps();

            $table->foreign('idViaje')->references('idViaje')->on('viaje')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idTipoPago')->references('idTipoPago')->on('tipoPago')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('pago');
    }
};
