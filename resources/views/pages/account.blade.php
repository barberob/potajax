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
            <a class="btn btn-outline-primary" href="{{ route('update_user') }}" role="button">Changer mes informations</a>
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

                    @if(count($myshop->pictures) == 0)
                        <img src="./img/shopping-cart.svg" class="card-img-top" alt="icone shop responsable">
                    @else
                        <img src="{{ $myshop->pictures[0]->url }}" class="card-img-top img_shop" style="height:auto; border-radius:33px;" alt="icone shop responsable">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{$myshop->nom}}</h5>
                        <p class="card-text">{{$myshop->numRue}} {{$myshop->adresse}} {{ $myshop->codeNote }}</p>
                        <a href="{{ route('stats', ['id' => $myshop->id]) }}" class="stats btn btn-outline-primary text-primary">
                            Voir les statistiques
                        </a>
                        <a href="{{ route('update_shop',['id' => $myshop->id]) }}"
                           class="btn btn-primary"
                        >
                            Modifier
                        </a>
                        <a class="btn btn-success" href="{{ route('shop', ['id' => $myshop->id]) }}" role="button">Voir la page</a>
                    </div>
                </div>
            @endforeach
        </div>

        @endif
    @endmanager


@endsection
