@extends('layouts.app')


@section('content')


    <div class="home text-center">
        <div class="rounded-circle"></div>
        <h1 class="py-3">
            Bienvenue sur votre compte <b>{{ $auth->prenom }}</b>
        </h1>
        <p>Email : {{ $auth->email }}</p>
        <p>Tel : {{ $auth->tel }}</p>
        <a class="btn btn-outline-warning" href="{{ route('favorites') }}" role="button">Voir mes favoris</a><br>
        <a class="btn btn-outline-primary" href="#" role="button">Me deconnecter</a>
    </div>

    @manager
    <div class="row py-5">
        <div class="col-md-6">
            <h2 class="py-3">Vous n'avez pas encore de magasins/restaurants</h2>
            <a href="{{ route('add_shop') }}" class="btn btn-primary">Ajouter</a>
        </div>
    </div>
    @endmanager


@endsection
