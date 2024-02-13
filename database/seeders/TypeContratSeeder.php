<?php

namespace Database\Seeders;

use App\Models\TypeContrat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeContratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeContrats = ['CDI' , 'CDD' , 'Stage'];

        foreach ($typeContrats as $contrat)
        {
            TypeContrat::create([
                'name' => $contrat
            ]);
        }
    }
}
