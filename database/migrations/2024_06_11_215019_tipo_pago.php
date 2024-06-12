<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tipoPago', function (Blueprint $table) {

            $table->id('idTipoPago');   
            $table->string('tipo');   
            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tipoPago');
    }
};
