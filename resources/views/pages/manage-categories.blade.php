@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <h1 class="mb-3">Ajouter des catégories</h1>
        <div class="row">
            @foreach($categories as $category)
                <div class="card col-md-4 px-0 mx-3 mb-4">
                    <div class="card-header">
                        <h2>{{ $category->libelle }}</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('update_category', [ 'category_id' => $category->id]) }}"
                           class="d-block text-center"
                        >
                            Modifier
                        </a>
                        <hr class="my-3">
                        <a href="{{ route('manage_subcategories', [ 'category_id' => $category->id]) }}"
                           class="d-block text-center"
                        >
                            Sous-catégories
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="pt-5 pb-2">Ajouter une catégorie</h2>
        <form method="POST" action="{{ route('post_add_category') }}">
            @csrf
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" {{ old('name') }}>
            <button type="submit" class="btn btn-primary mt-5 d-block">Valider</button>
        </form>
    </div>
@endsection
