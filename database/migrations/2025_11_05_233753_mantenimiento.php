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
        Schema::create('mantenimiento', function (Blueprint $table) {
            $table->id();
            $table->foreign("idVehiculo")->references("id")->on("vehiculo")->onDelete("cascade");
            $table->unsignedBigInteger("idVehiculo");
            $table->String('observacion');
            $table->foreign("idEstado")->references("id")->on("estado")->onDelete("cascade");
            $table->unsignedBigInteger("idEstado");
            $table->foreign("idAsesor")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("idAsesor");
            $table->foreign("idMecanico")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("idMecanico");
            $table->date("fechaProgramada");
            $table->date("fechaRealizado")->nullable();
            $table->String('observacionMecanico')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimiento');
    }
};
