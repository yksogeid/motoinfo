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
        Schema::create("documentovehiculo", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("vehiculo_id");
            $table->foreign("vehiculo_id")->references("id")->on("vehiculo")->onDelete("cascade");
            $table->unsignedBigInteger("tipo_documento_id");
            $table->foreign("tipo_documento_id")->references("id")->on("tipodocumento")->onDelete("cascade");
            $table->string("urlArchivo");
            $table->dateTime("fechaSubida");
            $table->unsignedBigInteger("id_estado_validacion");
            $table->foreign("id_estado_validacion")->references("id")->on("estado")->onDelete("cascade");
            $table->string("observacion")->nullable();
            $table->unsignedBigInteger("id_admin_aprobo")->nullable()->default(null);
            $table->foreign("id_admin_aprobo")->references("id")->on("users")->onDelete("cascade");
            $table->dateTime("fecha_aprobacion")->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("documentovehiculo");
    }
};
