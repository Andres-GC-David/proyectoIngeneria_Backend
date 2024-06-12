<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('vehiculo', function (Blueprint $table) {

            $table->id('idVehiculo');
            $table->unsignedBigInteger('idMarca');
            $table->unsignedBigInteger('idColor');
            $table->string('placa');
            $table->string('modelo');
            $table->timestamps();

            $table->foreign('idMarca')->references('idMarca')->on('marca')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idColor')->references('idColor')->on('color')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('vehiculo');
    }
};
