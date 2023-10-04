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
            'name' => 'Atacadista'
        ]);
        Categorias::create([
            'name' => 'Varejista'
        ]);
        Categorias::create([
            'name' => 'Vestiário'
        ]);
        Categorias::create([
            'name' => 'Móveis'
        ]);
        Categorias::create([
            'name' => 'Médicamentos'
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
