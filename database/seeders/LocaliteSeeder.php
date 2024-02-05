<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocaliteSeeder extends Seeder
{
     /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senegalLocalites = ['Dakar', 'Thiès', 'Kaolack', 'Ziguinchor', 'Saint-Louis', 'Kédougou'];

        foreach ($senegalLocalites as $localite) {
            Localite::create([
                'name' => $localite,
            ]);
        }

    }
}
