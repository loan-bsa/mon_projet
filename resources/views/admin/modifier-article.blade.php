@extends('layouts.app')

@section('titre', "Modifier l'article")

@section('contenu')
<h1>Modifier l'article</h1>

<form method="POST" action="{{ route('admin.articles.update', $article) }}" style="max-width:500px">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ $article->nom }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" required>{{ $article->description }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Prix (€)</label>
        <input type="number" name="prix" class="form-control" step="0.01" value="{{ $article->prix }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Catégories</label>
        @foreach($categories as $cat)
            <div class="form-check">
                <input type="checkbox" name="categories[]" value="{{ $cat->id }}" class="form-check-input" id="cat{{ $cat->id }}"
                    {{ $article->categories->contains($cat->id) ? 'checked' : '' }}>
                <label class="form-check-label" for="cat{{ $cat->id }}">{{ $cat->nom }}</label>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection
