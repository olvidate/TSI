<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'rut_cliente'=>215791602,
                'email' => 'benjamin.ortizcl@gmail.com',
                'password' => Hash::make('123'),
                'rol_id' => 1,
                'nombre' => 'Admin',
                'apellido' => 'Istrador',
                'direccion' => null,
                'num_tlf' => null,
                'nombre_empresa' => null,
                'holding_empresa' => null,
            ],
            [
                'rut_cliente'=>77239234,
                'email' => 'admin@google.com',
                'password' => Hash::make('google'),
                'rol_id' => 2,
                'nombre' => null,
                'apellido' => null,
                'direccion' => null,
                'num_tlf' => null,
                'nombre_empresa' => 'Google',
                'holding_empresa' => 'Servicios de software',
            ],
        ]);
    }
}
