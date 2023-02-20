<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            'title' => 'Programar un coso',
            'description' => 'Cosos de programacion que el diseñador no entiende',
            'id_proyect' => 1,
            'id_user' => 2,
            'id_time' => 1,
        ]);
        DB::table('tasks')->insert([
            'title' => 'Diseñar un coso',
            'description' => 'Cosos de diseño que el cliente no entiende',
            'id_proyect' => 1,
            'id_user' => 1,
            'id_time' => 1,
        ]);
        DB::table('tasks')->insert([
            'title' => 'Preparar un coso',
            'id_proyect' => 1,
            'id_user' => 3,
            'id_time' => 1,
        ]);
    }
}
