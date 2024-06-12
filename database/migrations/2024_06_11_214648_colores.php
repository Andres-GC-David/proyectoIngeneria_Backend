<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('color', function (Blueprint $table) {

            $table->id('idColor');   
            $table->string('color');   
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('color');
    }
};
