@extends('layouts.app')

@section('titre', 'Inscription')

@section('contenu')
<h1>Inscription</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $erreur)
                <li>{{ $erreur }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('inscription') }}" style="max-width:400px">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="mot_de_passe" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

<p class="mt-3"><a href="{{ route('connexion') }}">Déjà inscrit ? Se connecter</a></p>
@endsection
