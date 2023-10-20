<?php

namespace Database\Seeders;

use App\Models\EnderecoEmpresas;
use Illuminate\Database\Seeder;

class EnderecoEmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EnderecoEmpresas::create([
            'rua' => 'Avenida Amadeu da Silva Samelo',
            'complemento' => 'Casa',
            'numero' => '763',
            'cep' => '05760-140',
            'bairro' => 'Jardim Martinica',
            'cidade' => 'São Paulo',
            'estado' => 'Sp',
            'pais' => 'Brasil',
        ]);
    }
}
