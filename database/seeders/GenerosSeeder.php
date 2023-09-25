<?php

namespace Database\Seeders;

use App\Models\Generos;
use Illuminate\Database\Seeder;

class GenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Generos::create([
            'name' => 'Masculino'
        ]);
        Generos::create([
            'name' => 'Feminino'
        ]);
        Generos::create([
            'name' => 'Não binário'
        ]);
    }
}
