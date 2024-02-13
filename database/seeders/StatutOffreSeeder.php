<?php

namespace Database\Seeders;

use App\Models\StatutOffre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatutOffreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusOffre = ['ouvert','fermer','en cours'];

        foreach ($statusOffre as $statut)
        {
            StatutOffre::create([
                'name' => $statut
            ]);
        }
    }
}
