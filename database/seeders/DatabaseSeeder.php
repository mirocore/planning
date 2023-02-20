<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([TimeSeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([StateSeeder::class]);
        $this->call([ProjectSeeder::class]);
        $this->call([TaskSeeder::class]);
    }
}

