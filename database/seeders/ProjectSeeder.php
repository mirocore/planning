<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            'name' => 'Template 5',
            'archived' => 0,
            'priority' => 0,
            'id_state' => 1,
            'id_product' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('projects')->insert([
            'name' => 'Corregir todo lo roto',
            'archived' => 1,
            'priority' => 0,
            'id_state' => 2,
            'id_product' => 2,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('projects')->insert([
            'name' => 'Averiguar porqué se fue Enzo',
            'archived' => 0,
            'priority' => 1,
            'id_state' => 3,
            'id_product' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
