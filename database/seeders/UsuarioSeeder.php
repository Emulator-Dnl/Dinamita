<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Usuario::factory()->times(1)->admin()->create();
    	Usuario::factory()->times(1)->usuario()->create();
        Usuario::factory()->times(5)->create();
    }
}
