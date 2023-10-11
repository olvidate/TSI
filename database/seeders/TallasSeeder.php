<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TallasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tallas')->insert([
            ['nombre'=>'No posee'],
            ['nombre'=>'XS'],
            ['nombre'=>'S'],
            ['nombre'=>'M'],
            ['nombre'=>'L'],
            ['nombre'=>'XL'],
        ]);
    }
}
