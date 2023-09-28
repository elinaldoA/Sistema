<?php

namespace Database\Seeders;

use App\Models\Receitas;
use Illuminate\Database\Seeder;

class ReceitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Receitas::create([
            'data' => now(),
            'n_doc' => '#00001',
            'cliente_id' => '1',
            'valor' => '100000',
            'dt_recebido' => now(),
            'vl_recebido' => '100000',
            'obs' => 'teste',
        ]);
    }
}
