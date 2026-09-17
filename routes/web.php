<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategorieController as AdminCategorieController;
use App\Http\Controllers\Admin\UtilisateurController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('accueil');

Route::get('/categorie/{id}', [CategorieController::class, 'show'])->name('categorie');
Route::post('/categorie/{id}', [CategorieController::class, 'ajouterPanier'])->name('categorie.panier');

Route::get('/panier', [PanierController::class, 'index'])->name('panier');
Route::post('/panier/ajouter', [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::post('/panier/valider', [PanierController::class, 'valider'])
    ->middleware('auth')
    ->name('panier.valider');

Route::get('/connexion', [AuthController::class, 'showConnexion'])->name('connexion');
Route::post('/connexion', [AuthController::class, 'connexion']);
Route::get('/inscription', [AuthController::class, 'showInscription'])->name('inscription');
Route::post('/inscription', [AuthController::class, 'inscription']);
Route::post('/deconnexion', [AuthController::class, 'deconnexion'])->name('deconnexion');
Route::post('/supprimer-compte', [AuthController::class, 'supprimerCompte'])
    ->middleware('auth')
    ->name('compte.supprimer');

Route::get('/mot-de-passe-oublie', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/mot-de-passe-oublie', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reinitialiser-mot-de-passe/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reinitialiser-mot-de-passe', [PasswordResetController::class, 'reset'])->name('password.update');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/ajouter', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/modifier', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    Route::get('/categories', [AdminCategorieController::class, 'index'])->name('categories.index');
    Route::post('/categories', [AdminCategorieController::class, 'store'])->name('categories.store');
    Route::put('/categories/{categorie}', [AdminCategorieController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{categorie}', [AdminCategorieController::class, 'destroy'])->name('categories.destroy');

    Route::get('/utilisateurs', [UtilisateurController::class, 'index'])->name('utilisateurs.index');
    Route::post('/utilisateurs', [UtilisateurController::class, 'store'])->name('utilisateurs.store');
    Route::put('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'update'])->name('utilisateurs.update');
    Route::delete('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'destroy'])->name('utilisateurs.destroy');
});
