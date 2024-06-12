<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tipoUsuario', function (Blueprint $table) {

            $table->id('idTipoUsuario');   
            $table->string('tipo');   
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipoUsuario');
    }
};
