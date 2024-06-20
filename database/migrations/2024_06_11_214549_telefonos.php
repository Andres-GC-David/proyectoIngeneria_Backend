<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::create('telefono', function (Blueprint $table) {

            $table->id('idTelefono');
            $table->unsignedBigInteger('idUsuario');
            $table->string('telefono');
            $table->boolean('isVerified')->default(false);
            $table->timestamps();

            $table->foreign('idUsuario')->references('idUsuario')->on('usuario')->onUpdate('cascade')->onDelete('cascade');
        });
        
    }


    public function down(): void
    {

        Schema::dropIfExists('telefono');
        
    }
};
