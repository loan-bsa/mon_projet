<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre', 'Basket2Ballers')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('accueil') }}">Basket2Ballers</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('accueil') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('panier') }}">Panier</a></li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    @if(auth()->user()->is_admin)
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">Admin</a></li>
                    @endif
                    <li class="nav-item">
                        <form method="POST" action="{{ route('deconnexion') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Déconnexion</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('compte.supprimer') }}" class="d-inline" onsubmit="return confirm('Supprimer définitivement ton compte ?')">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-danger">Supprimer mon compte</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('connexion') }}">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('inscription') }}">S'inscrire</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main class="container my-4">
    @if(session('succes'))
        <div class="alert alert-success">{{ session('succes') }}</div>
    @endif

    @yield('contenu')
</main>

<footer class="bg-light text-center py-3 mt-4 border-top">
    <p class="mb-0">&copy; {{ date('Y') }} Basket2Ballers</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
