@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gérer les données du site</h1>
        <a href="{{ route('manage_categories') }}" class="btn btn-primary my-5 mr-3">Gérer les catégories</a>
        <a href="{{ route('manage_shops') }}" class="btn btn-primary my-5 ml-3">Gérer les commerces en attente de validation</a>
    </div>
@endsection
