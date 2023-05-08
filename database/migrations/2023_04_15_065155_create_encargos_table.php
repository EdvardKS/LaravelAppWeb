<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('encargos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_apellidos');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->text('detalles')->nullable();
            $table->dateTime('hora_entrega');
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->boolean('entregado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encargos');
    }
};
