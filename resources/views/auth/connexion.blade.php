@extends('layouts.app')

@section('titre', 'Connexion')

@section('contenu')
<h1>Connexion</h1>

@error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<form method="POST" action="{{ route('connexion') }}" style="max-width:400px">
    @csrf
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="mot_de_passe" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<p class="mt-3">
    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a> ·
    <a href="{{ route('inscription') }}">Créer un compte</a>
</p>
@endsection
