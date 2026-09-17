@extends('layouts.app')

@section('titre', 'Mot de passe oublié')

@section('contenu')
<h1>Mot de passe oublié</h1>

@error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<form method="POST" action="{{ route('password.email') }}" style="max-width:400px">
    @csrf
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer le lien</button>
</form>
@endsection
