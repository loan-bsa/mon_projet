<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return view('admin.utilisateurs', compact('utilisateurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'mot_de_passe' => 'required|min:6',
        ]);

        Utilisateur::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
            'is_admin' => $request->boolean('is_admin'),
        ]);

        return back();
    }

    public function update(Request $request, Utilisateur $utilisateur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
        ]);

        $utilisateur->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'is_admin' => $request->boolean('is_admin'),
        ]);

        return back();
    }

    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();
        return back();
    }
}
