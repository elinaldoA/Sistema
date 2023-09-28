<?php

namespace Database\Seeders;

use App\Models\Empresas;
use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresas::create([
            'name' => 'Vicente e Patrícia Locações de Automóveis Ltda',
            'description' => 'Teste',
            'cnpj' => '41.555.740/0001-71',
            'email' => 'orcamento@vicenteepatricialocacoesdeautomoveisltda.com.br',
            'active' => true,
        ]);
    }
}
