@extends('layouts.app')

@section('titre', 'Gérer les articles')

@section('contenu')
<h1>Articles</h1>
<a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm mb-3">Ajouter un article</a>

<table class="table">
    <tr><th>Nom</th><th>Prix</th><th>Catégories</th><th>Actions</th></tr>
    @foreach($articles as $article)
        <tr>
            <td>{{ $article->nom }}</td>
            <td>{{ number_format($article->prix, 2) }} €</td>
            <td>{{ $article->categories->pluck('nom')->join(', ') }}</td>
            <td>
                <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-primary">Modifier</a>
                <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" class="d-inline" onsubmit="return confirm('Supprimer cet article ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
