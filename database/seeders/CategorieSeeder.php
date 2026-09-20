<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Maillots', 'Shorts', 'Accessoires', 'Ballons', 'Baskets'];

        foreach ($categories as $nom) {
            Categorie::create(['nom' => $nom]);
        }
    }
}
