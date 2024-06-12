<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::create('cliente', function (Blueprint $table) {

            $table->id('idCliente');
            $table->unsignedBigInteger('idUsuario');
            $table->date('fechaDeNacimiento');
            $table->timestamps();

            $table->foreign('idUsuario')->references('idUsuario')->on('usuario')->onUpdate('cascade')->onDelete('cascade');
        });
       
    }


    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
