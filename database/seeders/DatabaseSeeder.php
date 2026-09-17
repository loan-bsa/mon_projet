<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // L'ordre compte : les catégories doivent exister avant les articles
        // (contrainte de clé étrangère id_categorie)
        $this->call([
            CategorieSeeder::class,
            ArticleSeeder::class,
            UtilisateurSeeder::class,
        ]);
    }
}
