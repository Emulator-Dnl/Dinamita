<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::factory()->times(1)->admin()->create();
    	User::factory()->times(1)->usuario()->create();
    	User::factory()->times(10)->create();
    }
}
