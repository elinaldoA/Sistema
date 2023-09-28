<?php

namespace Database\Seeders;

use App\Models\Enderecos;
use Illuminate\Database\Seeder;

class EnderecosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enderecos::create([
            'rua' => 'Avenida Amadeu da Silva Samelo',
            'complemento' => 'Casa',
            'numero' => '763',
            'cep' => '05760-140',
            'bairro' => 'Jardim Martinica',
            'cidade' => 'São Paulo',
            'estado' => 'Sp',
            'pais' => 'Brasil',
            'empresa_id' => '1',
        ]);

        Enderecos::create([
            'rua' => 'Avenida Três',
            'complemento' => 'Apartamento 01',
            'numero' => '691',
            'cep' => '65063-040',
            'bairro' => 'Angelim',
            'cidade' => 'São Luís',
            'estado' => 'Ma',
            'pais' => 'Brasil',
            'cliente_id' => '1',
        ]);
    }
}
