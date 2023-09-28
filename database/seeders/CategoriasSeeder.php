<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorias::create([
            'name' => 'Alimento'
        ]);
        Categorias::create([
            'name' => 'Atacado'
        ]);
        Categorias::create([
            'name' => 'Varejo'
        ]);
        Categorias::create([
            'name' => 'Vestuário'
        ]);
        Categorias::create([
            'name' => 'Saúde'
        ]);
        Categorias::create([
            'name' => 'Beleza'
        ]);
        Categorias::create([
            'name' => 'Academia'
        ]);
        Categorias::create([
            'name' => 'Petshop'
        ]);
        Categorias::create([
            'name' => 'Construção'
        ]);
        Categorias::create([
            'name' => 'Automotivo'
        ]);
    }
}
