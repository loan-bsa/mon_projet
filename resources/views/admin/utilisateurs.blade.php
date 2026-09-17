@extends('layouts.app')

@section('titre', 'Gérer les utilisateurs')

@section('contenu')
<h1>Utilisateurs</h1>

<form method="POST" action="{{ route('admin.utilisateurs.store') }}" class="row g-2 mb-4">
    @csrf
    <div class="col-auto"><input type="text" name="nom" placeholder="Nom" class="form-control" required></div>
    <div class="col-auto"><input type="email" name="email" placeholder="Email" class="form-control" required></div>
    <div class="col-auto"><input type="password" name="mot_de_passe" placeholder="Mot de passe" class="form-control" required></div>
    <div class="col-auto form-check pt-2">
        <input type="checkbox" name="is_admin" class="form-check-input" id="isadmin">
        <label class="form-check-label" for="isadmin">Admin</label>
    </div>
    <div class="col-auto"><button type="submit" class="btn btn-primary">Ajouter</button></div>
</form>

<table class="table">
    <tr><th>Nom</th><th>Email</th><th>Admin</th><th>Actions</th></tr>
    @foreach($utilisateurs as $user)
        @php $formId = 'form-user-' . $user->id; @endphp
        <tr>
            <td><input type="text" name="nom" form="{{ $formId }}" value="{{ $user->nom }}" class="form-control"></td>
            <td><input type="email" name="email" form="{{ $formId }}" value="{{ $user->email }}" class="form-control"></td>
            <td><input type="checkbox" name="is_admin" form="{{ $formId }}" {{ $user->is_admin ? 'checked' : '' }}></td>
            <td>
                <button type="submit" form="{{ $formId }}" class="btn btn-sm btn-primary">Modifier</button>
                <form method="POST" action="{{ route('admin.utilisateurs.destroy', $user) }}" class="d-inline" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <form id="{{ $formId }}" method="POST" action="{{ route('admin.utilisateurs.update', $user) }}">
            @csrf
            @method('PUT')
        </form>
    @endforeach
</table>
@endsection
