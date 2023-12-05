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
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->integer('id_factura');
            $table->string('rut_cliente', 10);
            $table->string('cod_producto', 7);
            $table->unsignedSmallInteger('cantidad');
            $table->integer('precio');
            $table->foreign('id_factura')->references('id')->on('facturas');
            $table->foreign('rut_cliente')->references('rut_cliente')->on('clientes');
            $table->foreign('cod_producto')->references('cod_producto')->on('productos');
            $table->primary(['id_factura', 'rut_cliente', 'cod_producto']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_factura');
    }
};
