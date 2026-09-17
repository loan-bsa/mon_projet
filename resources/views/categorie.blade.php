@extends('layouts.app')

@section('titre', 'Articles - ' . $categorie->nom)

@section('contenu')
<h1>{{ $categorie->nom }}</h1>

@if($articles->count() > 0)
    <div class="row">
        @foreach($articles as $article)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $article->nom }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <p class="fw-bold">{{ number_format($article->prix, 2) }} €</p>
                        <form method="POST" action="{{ route('categorie.panier', $categorie->id) }}" class="mt-auto">
                            @csrf
                            <input type="hidden" name="id_article" value="{{ $article->id }}">
                            <div class="input-group mb-2">
                                <input type="number" name="quantite" value="1" min="1" class="form-control">
                                <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Aucun article dans cette catégorie pour le moment.</p>
@endif
@endsection
