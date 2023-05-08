<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('horarios_apertura', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_dia');
            $table->enum('estado', ['Abierto', 'Cerrado']);
            $table->time('h_abierto');
            $table->time('h_cerrado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_apertura');
    }
};
