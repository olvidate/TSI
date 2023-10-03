<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proveedores')->insert([
            ['cod_proveedor'=>111, 'nombre' => 'Amaro Incorporate', 'descripcion' => 'Empresa con mala calidad'],
            ['cod_proveedor'=>222, 'nombre' => 'Lirol Incorporate', 'descripcion' => 'Empresa con buena calidad'],
        ]);
    }
}
