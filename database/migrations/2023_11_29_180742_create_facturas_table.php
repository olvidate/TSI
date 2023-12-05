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
        Schema::create('facturas', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('rut_cliente', 10);
            $table->integer('id_cotizacion');
            $table->date('fecha_emision');
            $table->integer('monto_neto');
            $table->foreign('rut_cliente')->references('rut_cliente')->on('clientes');
            $table->foreign('id_cotizacion')->references('id')->on('cotizaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
