<?php

namespace Database\Seeders;

use App\Models\Clientes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clientes::create([
            'name' => 'cliente 01',
            'cpf' => '111.234.342-09',
            'genero_id' => '1',
            'email' => 'cliente@cliente.com',
            'password' => Hash::make('cliente'),
            'active' => true,
            'empresa_id' => '1',
        ]);
    }
}
