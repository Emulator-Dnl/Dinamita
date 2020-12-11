<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sucursals')->insert(['nombre' => 'Río Nilo']);
        DB::table('sucursals')->insert(['nombre' => 'El Salto']);
        DB::table('sucursals')->insert(['nombre' => 'Tonalá']);
        DB::table('sucursals')->insert(['nombre' => 'Centro']);
    }
}
