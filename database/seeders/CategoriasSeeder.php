<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['cod_categoria' => 11, 'nombre' => 'Vestimenta', 'descripcion' => 'Productos de vestimenta'],
            ['cod_categoria' => 22, 'nombre' => 'Herramientas', 'descripcion' => 'Martillos, motocierras'],
        ]);
    }
}
