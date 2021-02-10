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

        <div class="filters d-flex justify-content-around mt-5 px-5" id="cat">
            

            @foreach($categories as $categorie)
                <a href="{{ route('map', ['category_id' => $categorie->id]) }}" class="lien_cat">
                    <div class="d-flex align-items-center flex-column">
                        
                            <div id="zoom" class="rounded-circle bg-secondary category_image mb-3 mx-3"
                             style="background-image:url('img/{{$categorie->libelle}}.jpg');"></div>
                            <h3 class="text-dark">{{ $categorie->libelle }}</h3>
                        
                    </div>
                </a>

            @endforeach
            
        </div>
    </div>

@endsection
