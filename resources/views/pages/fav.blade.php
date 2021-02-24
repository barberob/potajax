@extends('layouts.app')


@section('content')

    <div class="home text-center">
        Coucou je suis un favoris
    </div>

    @foreach($shops as $shop)

    	<p class="text-center"> {{ $shop->nom }} </p>

    @endforeach

@endsection
