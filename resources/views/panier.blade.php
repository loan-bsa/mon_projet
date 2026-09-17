@extends('layouts.app')

@section('titre', 'Panier')

@section('contenu')
<h1>Panier</h1>

<form method="POST" action="{{ route('panier.ajouter') }}" class="row g-2 mb-4">
    @csrf
    <div class="col-auto">
        <select name="id" class="form-select">
            @foreach($articles_disponibles as $article)
                <option value="{{ $article->id }}">{{ $article->nom }} - {{ number_format($article->prix, 2) }} €</option>
            @endforeach
        </select>
    </div>
    <div class="col-auto">
        <input type="number" name="quantite" value="1" min="1" class="form-control" style="width:90px">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</form>

<table class="table">
    <tr><th>Produit</th><th>Prix</th><th>Quantité</th><th>Sous-total</th></tr>
    @foreach($panier as $item)
        <tr>
            <td>{{ $item['nom'] }}</td>
            <td>{{ number_format($item['prix'], 2) }} €</td>
            <td>{{ $item['quantite'] }}</td>
            <td>{{ number_format($item['prix'] * $item['quantite'], 2) }} €</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td><strong>{{ number_format($total, 2) }} €</strong></td>
    </tr>
</table>

@auth
    <form method="POST" action="{{ route('panier.valider') }}">
        @csrf
        <button type="submit" class="btn btn-success">Valider la commande</button>
    </form>
@else
    <p>Connecte-toi pour valider ta commande. <a href="{{ route('connexion') }}">Se connecter</a></p>
@endauth
@endsection
