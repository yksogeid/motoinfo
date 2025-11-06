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
        Schema::create('mantenimiento_repuesto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idRepuesto');
            $table->foreign('idRepuesto')->references('id')->on('repuesto')->onDelete('cascade');
            $table->unsignedBigInteger('idMantenimiento');
            $table->foreign('idMantenimiento')->references('id')->on('mantenimiento')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimiento_repuesto');
    }
};
