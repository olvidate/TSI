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
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('rut_cliente', 10)->primary();
            $table->string('email', 50);
            $table->string('password');
            $table->unsignedSmallInteger('rol_id');
            $table->string('nombre', 20)->nullable();
            $table->string('apellido', 20)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('num_tlf', 10)->nullable();
            $table->string('nombre_empresa', 50)->nullable();
            $table->string('holding_empresa', 50)->nullable();
            $table->foreign('rol_id')->references('id')->on('roles');
//            $table->string('giro_empresa')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
