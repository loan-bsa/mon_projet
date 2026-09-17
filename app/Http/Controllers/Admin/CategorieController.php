<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required|string|max:255']);
        Categorie::create(['nom' => $request->nom]);
        return back();
    }

    public function update(Request $request, Categorie $categorie)
    {
        $request->validate(['nom' => 'required|string|max:255']);
        $categorie->update(['nom' => $request->nom]);
        return back();
    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return back();
    }
}
