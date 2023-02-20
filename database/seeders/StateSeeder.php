<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insert(['name' => 'sin empezar']);
        DB::table('states')->insert(['name' => 'pausado']);
        DB::table('states')->insert(['name' => 'en proceso']);
        DB::table('states')->insert(['name' => 'finalizado']);
    }
}
