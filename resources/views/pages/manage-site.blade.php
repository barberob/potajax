@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gérer les données du site</h1>
        <a href="{{ route('manage_categories') }}" class="btn btn-primary my-5">Gérer les catégories</a>
    </div>
@endsection
