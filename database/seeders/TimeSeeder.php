<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('times')->insert(['name' => 'xs']);
        DB::table('times')->insert(['name' => 's']);
        DB::table('times')->insert(['name' => 'm']);
        DB::table('times')->insert(['name' => 'l']);
        DB::table('times')->insert(['name' => 'xl']);
    }
}
