<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(['name' => 'BuscadorProp']);
        DB::table('products')->insert(['name' => 'Alquileres en Verano']);
        DB::table('products')->insert(['name' => 'Guias']);
        DB::table('products')->insert(['name' => 'GTAdmin']);
    }
}
