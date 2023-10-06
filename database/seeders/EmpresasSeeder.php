<?php

namespace Database\Seeders;

use App\Models\Empresas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Empresa 01',
            'description' => 'Teste',
            'cnpj' => '41.555.740/0001-71',
            'email' => 'empresa@empresa.com',
            'password' => Hash::make('empresa'),
            'modulo_id' => '3',
            'active' => true,
        ]);
    }
}
