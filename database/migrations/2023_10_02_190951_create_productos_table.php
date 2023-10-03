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
        Schema::create('productos', function (Blueprint $table) {
            $table->string('cod_producto', 7)->primary();
            $table->unsignedTinyInteger('cod_categoria');
            $table->string('nombre', 100);
            $table->text('descripcion');
            $table->integer('impuesto_adicional');
            $table->string('nombre_marca', 50);
            $table->unsignedTinyInteger('stock');
            $table->integer('id_talla');
            $table->integer('id_color');
            $table->foreign('cod_categoria')->references('cod_categoria')->on('categorias');
            $table->foreign('id_talla')->references('id')->on('tallas');
            $table->foreign('id_color')->references('id')->on('colores');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
