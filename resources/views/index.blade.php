@extends('layouts.app')

@section('titre', 'Basket2Ballers')

@section('contenu')
<h1>Catégories</h1>

<div class="row">
    @foreach($categories as $categorie)
        <div class="col-6 col-md-3 mb-3">
            <a href="{{ route('categorie', $categorie->id) }}" class="btn btn-outline-primary w-100 py-3">
                {{ $categorie->nom }}
            </a>
        </div>
    @endforeach
</div>
@endsection
