<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function show(int $id)
    {
        $categorie = Categorie::find($id);

        if (!$categorie) {
            $categorie = new Categorie(['nom' => 'Catégorie introuvable']);
            $articles = collect();
        } else {
            $articles = $categorie->articles;
        }

        return view('categorie', compact('categorie', 'articles'));
    }

    public function ajouterPanier(Request $request, int $id)
    {
        $article = Article::find($request->input('id_article'));
        $quantite = max(1, (int) $request->input('quantite', 1));

        if ($article) {
            $panier = session('panier', []);
            $panier[] = [
                'id' => $article->id,
                'nom' => $article->nom,
                'prix' => $article->prix,
                'quantite' => $quantite,
            ];
            session(['panier' => $panier]);
        }

        return back();
    }
}
