<?php

namespace Database\Seeders;

use App\Models\Modulos;
use Illuminate\Database\Seeder;

class ModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modulos::create([
            'name' => 'Indústria'
        ]);
        Modulos::create([
            'name' => 'Comércio'
        ]);
        Modulos::create([
            'name' => 'Serviços'
        ]);
    }
}
