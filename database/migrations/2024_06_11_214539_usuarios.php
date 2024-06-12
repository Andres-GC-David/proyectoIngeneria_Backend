<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
     
        Schema::create('usuario', function (Blueprint $table) {

            $table->id('idUsuario')->primary();
            $table->string('nombre');
            $table->string('apellido');
            $table->unsignedBigInteger('idTipoUsuario');
            $table->timestamps();

            $table->foreign('idTipoUsuario')->references('idTipoUsuario')->on('tipoUsuario')->onUpdate('cascade')->onDelete('cascade');
        });

    }


    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
