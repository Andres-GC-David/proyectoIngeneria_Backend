<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('clienteViaje', function (Blueprint $table) {

            $table->id('idClienteViaje');
            $table->unsignedBigInteger('idViaje');
            $table->unsignedBigInteger('idCliente');
            $table->timestamps();

            $table->foreign('idViaje')->references('idViaje')->on('viaje')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idCliente')->references('idCliente')->on('cliente')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clienteViaje');
    }
};
