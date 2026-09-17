<?php

namespace App\Http\Controllers;

use App\Models\Categorie;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('index', compact('categories'));
    }
}
