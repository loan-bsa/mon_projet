@extends('layouts.app')

@section('titre', 'Ajouter un article')

@section('contenu')
<h1>Ajouter un article</h1>

<form method="POST" action="{{ route('admin.articles.store') }}" style="max-width:500px">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Prix (€)</label>
        <input type="number" name="prix" class="form-control" step="0.01" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Catégories</label>
        @foreach($categories as $cat)
            <div class="form-check">
                <input type="checkbox" name="categories[]" value="{{ $cat->id }}" class="form-check-input" id="cat{{ $cat->id }}">
                <label class="form-check-label" for="cat{{ $cat->id }}">{{ $cat->nom }}</label>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
@endsection
