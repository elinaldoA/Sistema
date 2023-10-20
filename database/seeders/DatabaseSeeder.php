<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(AdminsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(ModulosSeeder::class);
        $this->call(PlanosSeeder::class);
        $this->call(GenerosSeeder::class);
        $this->call(EmpresasSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(EnderecoEmpresasSeeder::class);
        $this->call(EnderecoClientesSeeder::class);
        $this->call(ReceitasSeeder::class);
    }
}
