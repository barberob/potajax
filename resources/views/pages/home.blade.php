@extends('layouts.app')


@section('content')
    <div class="home">
        <div class="intro px-3">
            <input class="rounded-pill w-75 px-3 py-3" type="text" name="search" id="search" placeholder="Rechercher un commerce, une adresse...">
            <div>
                <h1 class="h1">Consommez mieux, consommez local</h1>
                <h2 class="h2">Découvrez les commerces en click & drive près de chez vous</h2>
            </div>
        </div>

        <div class="filters d-flex justify-content-around mt-5 px-5">
            <div class="d-flex align-items-center flex-column">
                <div class="rounded-circle bg-secondary category_image mb-3 mx-3"></div>
                <h3 class="text-dark">Catégorie</h3>
            </div>
            <div class="d-flex align-items-center flex-column">
                <div class="rounded-circle bg-secondary category_image mb-3 mx-3"></div>
                <h3 class="text-dark">Catégorie</h3>
            </div>
            <div class="d-flex align-items-center flex-column">
                <div class="rounded-circle bg-secondary category_image mb-3 mx-3"></div>
                <h3 class="text-dark">Catégorie</h3>
            </div>
            <div class="d-flex align-items-center flex-column">
                <div class="rounded-circle bg-secondary category_image mb-3 mx-3"></div>
                <h3 class="text-dark">Catégorie</h3>
            </div>
            <div class="d-flex align-items-center flex-column">
                <div class="rounded-circle bg-secondary category_image mb-3 mx-3"></div>
                <h3 class="text-dark">Catégorie</h3>
            </div>
            <div class="d-flex align-items-center flex-column">
                <div class="rounded-circle bg-secondary category_image mb-3 mx-3"></div>
                <h3 class="text-dark">Catégorie</h3>
            </div>
        </div>
    </div>

@endsection
