@extends('layouts.app')


@section('content')
    <div class="home">
        <div class="intro px-3">
            <input class="rounded-pill w-75 px-3 py-3 border-light" type="text" name="search" id="search" placeholder="Rechercher un commerce">
            <div>
                <h1 class="h1">Consommez mieux, consommez local</h1>
                <h2 class="h2">Découvrez les commerces en click & drive près de chez vous</h2>
            </div>
        </div>
    </div>

    <div class="filters w-100 d-flex align-content-around">
        <div>
            <div class="rounded-circle bg-light category_image"></div>
            <h3 class="text-dark">Catégorie</h3>
        </div>

        <div>
            <div class="rounded-circle bg-light category_image"></div>
            <h3 class="text-dark">Catégorie</h3>
        </div>

        <div>
            <div class="rounded-circle bg-light category_image"></div>
            <h3 class="text-dark">Catégorie</h3>
        </div>

        <div>
            <div class="rounded-circle bg-light category_image"></div>
            <h3 class="text-dark">Catégorie</h3>
        </div>
    </div>
@endsection
