<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index()
    {
        $articles_disponibles = Article::all();
        $panier = session('panier', []);

        $total = 0;
        foreach ($panier as $item) {
            $total += $item['prix'] * $item['quantite'];
        }
        session(['total' => $total]);

        return view('panier', compact('articles_disponibles', 'panier', 'total'));
    }

    public function ajouter(Request $request)
    {
        $article = Article::find($request->input('id'));
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

    public function valider()
    {
        $total = session('total', 0);
        session()->forget(['panier', 'total']);
        return view('commande-validee', compact('total'));
    }
}
