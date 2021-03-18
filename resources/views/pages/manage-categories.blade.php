@extends('layouts.app')

@section('content')
    @dump($categories)
    <div class="container">
        <h1 class="mb-3">Ajouter des catégories</h1>
        @foreach($categories as $category)
            <div class="mb-5">
                <h2>{{ $category->libelle }}</h2>
                <a href="{{ route('manage_subcategories', [ 'category_id' => $category->id]) }}"
                   class="btn btn-primary"
                >
                    Sous-catégories
                </a>
            </div>
        @endforeach
    </div>
@endsection
