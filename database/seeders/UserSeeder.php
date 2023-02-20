<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'  => 'Ramiro',
            'lastname'  => 'Belcore',
            'position' => 'Diseñador Gráfico',
            'email' => 'ramiro@grupotodo.com.ar',
            'password' => Hash::make('123456789'),
            'photo' => 'https://www.grupotodo.com.ar/wp-content/uploads/2022/04/Ramiro-Belcore.jpg',
            'id_role' => 3 
        ]);

        DB::table('users')->insert([
            'name'  => 'Juan',
            'lastname'  => 'Ledesma',
            'position' => 'Programador',
            'email' => 'juan@grupotodo.com.ar',
            'password' => Hash::make('123456789'),
            'photo' => 'https://www.grupotodo.com.ar/wp-content/uploads/2021/04/juan-ledesma-2020.jpg',
            'id_role' => 3 
        ]);

        DB::table('users')->insert([
            'name'  => 'Pablo',
            'lastname'  => 'Corzo',
            'position' => 'Programador',
            'email' => 'pablo@grupotodo.com.ar',
            'password' => Hash::make('123456789'),
            'photo' => 'https://www.grupotodo.com.ar/wp-content/uploads/2021/04/pablo_corzo_2020.jpg',
            'id_role' => 3 
        ]);

        DB::table('users')->insert([
            'name'  => 'Hernan',
            'lastname'  => 'Beati',
            'position' => 'Coordinador',
            'email' => 'hernan@grupotodo.com.ar',
            'password' => Hash::make('123456789'),
            'photo' => 'https://www.grupotodo.com.ar/wp-content/uploads/2021/04/hernan1.jpg',
            'id_role' => 2 
        ]);

        DB::table('users')->insert([
            'name'  => 'Gerónimo',
            'lastname'  => 'García',
            'position' => 'Programador',
            'email' => 'geronimo@grupotodo.com.ar',
            'password' => Hash::make('123456789'),
            'photo' => 'https://www.grupotodo.com.ar/wp-content/uploads/2022/11/geronimo.jpg',
            'id_role' => 3 
        ]);

        DB::table('users')->insert([
            'name'  => 'Nicolás',
            'lastname'  => 'Reggiani',
            'position' => 'CEO',
            'email' => 'nicolas@grupotodo.com.ar',
            'password' => Hash::make('123456789'),
            'photo' => 'https://www.grupotodo.com.ar/wp-content/uploads/2021/04/nicolas-reggiani.jpg',
            'id_role' => 1 
        ]);
    }
}
