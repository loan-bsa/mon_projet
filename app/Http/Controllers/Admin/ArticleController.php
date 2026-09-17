<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('categories')->get();
        return view('admin.articles', compact('articles'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('admin.ajout-article', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
        ]);

        $article = Article::create($request->only('nom', 'description', 'prix'));
        $article->categories()->sync($request->input('categories'));

        return redirect()->route('admin.articles.index')->with('succes', 'Article ajouté.');
    }

    public function edit(Article $article)
    {
        $categories = Categorie::all();
        return view('admin.modifier-article', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
        ]);

        $article->update($request->only('nom', 'description', 'prix'));
        $article->categories()->sync($request->input('categories'));

        return redirect()->route('admin.articles.index')->with('succes', 'Article modifié.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('succes', 'Article supprimé.');
    }
}
