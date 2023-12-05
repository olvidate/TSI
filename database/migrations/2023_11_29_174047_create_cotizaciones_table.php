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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('rut_cliente', 10);
            $table->tinyInteger('estado');
            $table->integer('precio_envio')->nullable();
            $table->integer('monto_neto')->nullable();

            $table->foreign('rut_cliente')
                ->references('rut_cliente')
                ->on('clientes')
                ->onDelete('cascade'); // Otra opción podría ser 'set null' dependiendo de tus necesidades

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
