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
        Schema::create('detalle_cotizacion', function (Blueprint $table) {
            $table->integer('id_cotizacion');
            $table->string('rut_cliente', 10);
            $table->string('cod_producto', 7);
            $table->integer('cantidad_producto');
            // Será rellenado por el administrador
            $table->integer('precio_producto')->nullable();
            //
            $table->timestamps();

            $table->foreign('id_cotizacion')->references('id')->on('cotizaciones');
            $table->foreign('rut_cliente')->references('rut_cliente')->on('clientes');
            $table->foreign('cod_producto')->references('cod_producto')->on('productos');

            $table->primary(['id_cotizacion', 'rut_cliente', 'cod_producto']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_cotizacion');
    }
};
