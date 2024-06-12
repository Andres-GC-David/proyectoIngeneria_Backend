<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('ruta', function (Blueprint $table) {

            $table->id('idRuta');   
            $table->string('ruta');   
            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('ruta');
    }
};
