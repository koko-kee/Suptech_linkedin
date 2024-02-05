<?php

namespace Database\Seeders;

use App\Models\Statut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Statut::create([
            'name' => 'EURL',
        ]);

        \App\Models\Statut::create([
            'name' => 'SNC',
        ]);

        \App\Models\Statut::create([
            'name' => 'SA',
        ]);




    }
}
