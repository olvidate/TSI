<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colores')->insert([
            ['nombre'=>'Rojo'],
            ['nombre'=>'Azul'],
            ['nombre'=>'Amarillo'],
        ]);
    }
}
