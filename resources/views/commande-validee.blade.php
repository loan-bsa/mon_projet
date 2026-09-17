@extends('layouts.app')

@section('titre', 'Commande validée')

@section('contenu')
<h1>Commande validée</h1>
<p>Montant total : <strong>{{ number_format($total, 2) }} €</strong></p>
<p>Merci pour votre achat !</p>
@endsection
