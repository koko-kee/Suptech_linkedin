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
       $this->call([
           StatutsSeeder::class,
           EntrepriseSeeder::class,
           LocaliteSeeder::class,
           NiveauSeeder::class,
           RoleSeeder::class,
           UserSeeder::class,
           OffreSeeder::class,
           StatutOffreSeeder::class,
           TypeContratSeeder::class
       ]);
    }
}
