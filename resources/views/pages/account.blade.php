@extends('layouts.app')


@section('content')

    <div class="home text-center">
        Coucou je suis ton compte
    </div>

    @manager
        <p>bravo vous etes manager, quelle classe</p>
    @endmanager
@endsection
