@extends('layouts.app')


@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
        <div class="col">
            <a href="{{ route('add_shop') }}" class="btn btn-success">Ajouter un autre magasin</a>
        </div>
        <div class="list">
            @foreach($myshops as $myshop)
                <div class="card shop" style="width: 15rem;">
                    <img src="./img/shopping-cart.svg" class="card-img-top" alt="icone shop responsable">
                    <div class="card-body">
                        <h5 class="card-title">{{$myshop->nom}}</h5>
                        <p class="card-text">{{$myshop->numRue}} {{$myshop->adresse}}</p>
                        <a href="#" class="btn btn-danger">Modifier</a>
                    </div>
                </div>
            @endforeach
        </div>
            
        @endif
    @endmanager


@endsection
