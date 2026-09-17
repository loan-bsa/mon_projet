<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            ['nom' => 'Maillot Lakers #23', 'description' => "Maillot réplique, floqué au dos.", 'prix' => 89.99, 'categories' => [1]],
            ['nom' => 'Maillot Bulls #23', 'description' => 'Édition classique rouge.', 'prix' => 84.99, 'categories' => [1]],
            ['nom' => 'Short Warriors', 'description' => "Short d'entraînement respirant.", 'prix' => 39.99, 'categories' => [2]],
            ['nom' => 'Short Celtics', 'description' => 'Coupe ample, tissu léger.', 'prix' => 37.99, 'categories' => [2]],
            ['nom' => 'Bandana Nike', 'description' => "Accessoire d'entraînement.", 'prix' => 12.99, 'categories' => [3]],
            ['nom' => 'Manchon de tir', 'description' => 'Maintien et compression.', 'prix' => 14.99, 'categories' => [3]],
            ['nom' => 'Ballon Spalding officiel', 'description' => 'Taille 7, usage intérieur/extérieur.', 'prix' => 34.99, 'categories' => [4]],
            ['nom' => 'Air Jordan 1', 'description' => 'Édition rétro, cuir premium.', 'prix' => 179.99, 'categories' => [5]],
            // Exemple d'article rattaché à DEUX catégories, pour démontrer le many-to-many
            ['nom' => 'Nike LeBron 21', 'description' => 'Chaussure performance dernière génération.', 'prix' => 199.99, 'categories' => [5, 3]],
        ];

        foreach ($articles as $item) {
            $article = Article::create([
                'nom' => $item['nom'],
                'description' => $item['description'],
                'prix' => $item['prix'],
            ]);

            $article->categories()->attach($item['categories']);
        }
    }
}
