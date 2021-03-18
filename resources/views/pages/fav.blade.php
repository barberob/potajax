@extends('layouts.app')


@section('content')

    @auth
        @if(count($shops) == 0)
            <h1 class="text-center"> Vous n'avez aucun commerce en favoris, ajoutez-en ! </h1>
        @else
            <h1 class="text-center"> Vos commerces favoris : </h1>
            <ul class="list-group list-group-flush">
            @foreach($shops as $shop)

                  <li class="list-group-item">{{ $shop->nom }}</li>

            @endforeach
            </ul>
        @endif
    @endauth
    <div id="favorite_list"></div>

@endsection
