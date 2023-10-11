<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            ['cod_producto'=>'P-3223', 'cod_categoria' => 11, 'nombre' => 'Polera manga corta', 'descripcion' => 'Polera con dimension 32x32', 'impuesto_adicional' => 0, 'nombre_marca' => 'Adidas', 'id_talla' => 3, 'id_color' => 1],
            ['cod_producto'=>'C-3211', 'cod_categoria' => 22, 'nombre' => 'Chaqueta', 'descripcion' => 'Chaqueta termoprotectora antibalas', 'impuesto_adicional' => 0, 'nombre_marca' => 'GAP', 'id_talla' => 4, 'id_color' => 2],
            ['cod_producto'=>'M-2311', 'cod_categoria' => 22, 'nombre'=>'Martillo', 'descripcion' => 'Un lindo martillo', 'impuesto_adicional' => 0, 'nombre_marca' => 'Desconocida', 'id_talla' => 1, 'id_color'=>1],
        ]);
    }
}
