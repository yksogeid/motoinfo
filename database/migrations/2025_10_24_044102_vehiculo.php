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
        Schema::create('vehiculo', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');

    $table->unsignedBigInteger('marca_id');
    $table->unsignedBigInteger('linea_id');
    $table->unsignedBigInteger('color_id');
    $table->unsignedBigInteger('tipo_id');

    // Relaciones
    $table->foreign('marca_id')->references('id')->on('marca')->onDelete('cascade');
    $table->foreign('linea_id')->references('id')->on('lineacomercial')->onDelete('cascade');
    $table->foreign('color_id')->references('id')->on('color')->onDelete('cascade');
    $table->foreign('tipo_id')->references('id')->on('tipo')->onDelete('cascade');

    $table->integer('cilindraje');
    $table->integer('modelo');
    $table->string('combustible');
    $table->integer('numeropasajero');
    $table->string('placa');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
