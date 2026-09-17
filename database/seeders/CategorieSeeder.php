<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        // L'ordre compte : sur une base vide, les id générés seront 1, 2, 3, 4, 5
        // dans cet ordre — ça correspond aux liens déjà codés dans index.blade.php
        $categories = ['Maillots', 'Shorts', 'Accessoires', 'Ballons', 'Baskets'];

        foreach ($categories as $nom) {
            Categorie::create(['nom' => $nom]);
        }
    }
}
