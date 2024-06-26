<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('marca', function (Blueprint $table) {

            $table->id('idMarca');   
            $table->string('marca');   
            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('marca');
    }
};
