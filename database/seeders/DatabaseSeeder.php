<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            ClientesSeeder::class,
            CategoriasSeeder::class,
            ProveedoresSeeder::class,
            ColoresSeeder::class,
            TallasSeeder::class,
            ProductosSeeder::class,
        ]);
    }
}
