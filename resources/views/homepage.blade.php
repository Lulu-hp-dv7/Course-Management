@extends('layoutsimple')

@section('title', 'Accueil')

@section('content')


<div class="home-container" style="height: 100vh; background-image: url('{{ asset('images/bg.jpg') }}'); background-size: cover; background-position: center; position: relative;">
    <!-- Overlay sombre -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7);"></div>
    
    <div class="d-flex justify-content-center align-items-center h-100" style="position: relative; z-index: 1;">
        <div class="text-center text-white">
            <h1 class="display-4">Bienvenue sur notre Plateforme</h1>
            <p class="lead">Nous sommes ravis de vous accueillir !</p>
            @auth
                @if (Route::has('admin.register'))
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg">Tableau de bord</a>
                    <a href="{{ route('admin.register') }}" class="btn btn-secondary btn-lg">Créer un Utilisateur</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Se connecter</a>
            @endauth
        </div>
    </div>
</div>
@endsection