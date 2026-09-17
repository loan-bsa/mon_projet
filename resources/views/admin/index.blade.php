@extends('layouts.app')

@section('titre', 'Administration')

@section('contenu')
<h1>Administration</h1>
<ul>
    <li><a href="{{ route('admin.articles.index') }}">Gérer les articles</a></li>
    <li><a href="{{ route('admin.categories.index') }}">Gérer les catégories</a></li>
    <li><a href="{{ route('admin.utilisateurs.index') }}">Gérer les utilisateurs</a></li>
</ul>
@endsection
