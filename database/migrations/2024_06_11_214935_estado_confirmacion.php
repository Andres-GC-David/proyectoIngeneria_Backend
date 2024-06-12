<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('estadoConfirmacion', function (Blueprint $table) {

            $table->id('idEstadoConfirmacion');   
            $table->string('estado');   
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estadoConfirmacion');
    }
};
