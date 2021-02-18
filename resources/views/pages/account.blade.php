@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="home text-center">
            <h1 class="py-3">Votre compte</h1>
        </div>

        @manager
        {{--        @forelse($shops ?? '' as $shop)--}}
        {{--        <div class="card">--}}
        {{--            <div class="card-header">--}}
        {{--                <h2>card</h2>--}}
        {{--            </div>--}}
        {{--            <div class="card-body"></div>--}}
        {{--        </div>--}}
        {{--        @empty--}}
        <div class="row py-5">
            <div class="col-md-6">
                <h2 class="py-3">Vous n'avez pas encore de magasins/restaurants</h2>
                <a href="" class="btn btn-primary">Ajouter</a>
            </div>
        </div>
        {{--        @endforelse--}}
        @endmanager
    </div>

@endsection
