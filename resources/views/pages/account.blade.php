@extends('layouts.app')


@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            Création réussie
        </div>
    @endif
    <div class="home">
        <div class="account text-center">
            <div class="rounded-circle"></div>
            <h1 class="py-3">
                Bienvenue sur votre compte <b>{{ $auth->prenom }}</b>
            </h1>
            <p>Email : {{ $auth->email }}</p>
            @if ($auth->tel != null)
                <p>Tel : {{ $auth->tel }}</p>
            @endif
            <a class="btn btn-outline-warning" href="{{ route('favorites') }}" role="button">Voir mes favoris</a><br>
            <a class="btn btn-outline-primary" href="{{ route('logout') }}" role="button">Me deconnecter</a>
        </div>
    </div>


    @manager
        @if(count($myshops) == 0)
            <div class="row-shop">
                <div class="col">
                    <h2>Vous n'avez pas encore de magasins/restaurants</h2>
                    <a href="{{ route('add_shop') }}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
        @else
        {{ $myshops }}
    @endmanager


@endsection
