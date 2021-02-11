@extends('layouts.app')

@section('content')
	<div class="page_map">
        <div class="filters d-flex justify-content mt-1 px-1">
        	<div class="dropdown mx-2 mt-2">
			  <button class="btn btn-light border-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
			    Catégories
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			  	@foreach($categories as $categorie)
			    	<li><a class="dropdown-item" href="{{ route('map', ['category_id' => $categorie->id]) }}">{{$categorie->libelle}}</a></li>
			    @endforeach
			  </ul>
			</div>
			<div class="dropdown mx-2 mt-2">
			  <button class="btn btn-light border-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
			    Sous catégories
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			  	@foreach($subcategories as $subcategorie)
			    	<li><a class="dropdown-item" href="#">{{$subcategorie->libelle}}</a></li>
			   	@endforeach
				    
			  </ul>
			</div>
            <form class="d-flex">
              <input class="rounded-pill px-2 py-2" type="text" name="search" id="search" placeholder="Rechercher un commerce, une adresse...">
              <button class="btn" type="submit"><i class="bi-search" style="font-size: 1.5rem; color: black;"></i></button>
            </form>
        </div>
        <div id="map"></div>

       
    </div>




@endsection