<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveauEtude = ['Primaire', 'Collège', 'Lycée', 'Université', 'Doctorat'];

        foreach ($niveauEtude as $niveau) {
            Niveau::create([
                'name' => $niveau,
            ]);
        }
    }
}
