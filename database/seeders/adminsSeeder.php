<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sistema',
            'email' => 'admin@sistema.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'active' => true,
        ]);
    }
}
