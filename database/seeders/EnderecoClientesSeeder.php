<?php

namespace Database\Seeders;

use App\Models\EnderecoClientes;
use Illuminate\Database\Seeder;

class EnderecoClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EnderecoClientes::create([
            'rua' => 'Avenida Três',
            'complemento' => 'Apartamento 01',
            'numero' => '691',
            'cep' => '65063-040',
            'bairro' => 'Angelim',
            'cidade' => 'São Luís',
            'estado' => 'Ma',
            'pais' => 'Brasil',
        ]);
    }
}
