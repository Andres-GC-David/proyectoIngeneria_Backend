<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('choferViaje', function (Blueprint $table) {

            $table->id('idChoferViaje');
            $table->unsignedBigInteger('idViaje');
            $table->unsignedBigInteger('idChofer');
            $table->timestamps();

            $table->foreign('idViaje')->references('idViaje')->on('viaje')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idChofer')->references('idChofer')->on('chofer')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('choferViaje');
    }
};
