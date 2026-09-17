@extends('layouts.app')

@section('titre', 'Gérer les catégories')

@section('contenu')
<h1>Catégories</h1>

<form method="POST" action="{{ route('admin.categories.store') }}" class="row g-2 mb-4">
    @csrf
    <div class="col-auto">
        <input type="text" name="nom" placeholder="Nom" class="form-control" required>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</form>

<table class="table">
    <tr><th>Nom</th><th>Actions</th></tr>
    @foreach($categories as $cat)
        @php $formId = 'form-cat-' . $cat->id; @endphp
        <tr>
            <td><input type="text" name="nom" form="{{ $formId }}" value="{{ $cat->nom }}" class="form-control"></td>
            <td>
                <button type="submit" form="{{ $formId }}" class="btn btn-sm btn-primary">Modifier</button>
                <form method="POST" action="{{ route('admin.categories.destroy', $cat) }}" class="d-inline" onsubmit="return confirm('Supprimer cette catégorie ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <form id="{{ $formId }}" method="POST" action="{{ route('admin.categories.update', $cat) }}">
            @csrf
            @method('PUT')
        </form>
    @endforeach
</table>
@endsection
