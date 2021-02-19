@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="home text-center">
            <h1 class="py-3">Votre compte</h1>
        </div>

        @manager
        <div class="row py-5">
            <div class="col-md-6">
                <h2 class="py-3">Vous n'avez pas encore de magasins/restaurants</h2>
                <a href="{{ route('add_shop') }}" class="btn btn-primary">Ajouter</a>
            </div>
        </div>
        @endmanager
    </div>

@endsection
