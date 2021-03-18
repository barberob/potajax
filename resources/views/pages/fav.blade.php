@extends('layouts.app')


@section('content')


    <div id="favorite_list"></div>
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
    @if(isset($shops))
        @if(count($shops) == 0)
            <h1 class="text-center"> Vous n'avez aucun commerce en favoris, ajoutez-en ! </h1>
        @else
            <h1 class="text-center"> Vos commerces favoris : </h1>
            <ul class="list-group list-group-flush">
                {{ dd($shops) }}
                @foreach($shops as $shop)

                    <li class="list-group-item">{{ $shop->nom }}</li>

                @endforeach
            </ul>
        @endif
    @endif


@endsection
