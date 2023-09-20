<?php

namespace Database\Seeders;

use App\Models\Planos;
use Illuminate\Database\Seeder;

class PlanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Planos::create([
            'name' => 'Mensal'
        ]);
        Planos::create([
            'name' => 'Trimestral'
        ]);
        Planos::create([
            'name' => 'Anual'
        ]);
    }
}
