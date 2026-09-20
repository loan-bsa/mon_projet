<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // les catégories doivent exister avant les articles par rapport a la clé étrangère id_categorie
        $this->call([
            CategorieSeeder::class,
            ArticleSeeder::class,
            UtilisateurSeeder::class,
        ]);
    }
}
