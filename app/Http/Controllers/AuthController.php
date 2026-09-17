<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showConnexion()
    {
        return view('auth.connexion');
    }

    public function connexion(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->mot_de_passe])) {
            $request->session()->regenerate();
            return redirect()->route('accueil');
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.']);
    }

    public function showInscription()
    {
        return view('auth.inscription');
    }

    public function inscription(Request $request)
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
            'is_admin' => false,
        ]);

        return redirect()->route('connexion')->with('succes', 'Compte créé, tu peux te connecter.');
    }

    public function deconnexion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('accueil');
    }

    public function supprimerCompte(Request $request)
    {
        $utilisateur = Auth::user();
        Auth::logout();
        $utilisateur->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('accueil')->with('succes', 'Compte supprimé.');
    }
}
