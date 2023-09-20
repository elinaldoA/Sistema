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
            'name' => 'Alimentos'
        ]);
        Categorias::create([
            'name' => 'Atacados'
        ]);
        Categorias::create([
            'name' => 'Varejos'
        ]);
        Categorias::create([
            'name' => 'Vestuários'
        ]);
        Categorias::create([
            'name' => 'Saúde'
        ]);
        Categorias::create([
            'name' => 'Beleza'
        ]);
        Categorias::create([
            'name' => 'Academias'
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
