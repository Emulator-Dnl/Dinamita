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
        //si los vas a dejar aquí, quizás tengas que quitar todos menos al admin
        $this->call(SucursalSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(ProductoSeeder::class);
    }
}
