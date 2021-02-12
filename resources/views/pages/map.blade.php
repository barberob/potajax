@extends('layouts.app')

@section('content')
	<div class="page_map">
        <div class="filters d-flex justify-content mt-4 px-4" id="navig">
        	<div id="btn">
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
			</div>
            <form class="d-flex">
              <input class="rounded-pill px-2 py-2" type="text" name="search" id="search" placeholder="Rechercher un commerce, une adresse...">
              <button class="btn" type="submit"><i class="bi-search"></i></button>
            </form>
        </div>
        <div class="container">
			 <div class="row">
			    <div class="col-lg-9" id="map">
			    	map
			    </div>
			    <div class="col" id="liste">
					  <div class="card-header">
					    {{ $current_category }}
					  </div>
					  <div class="card-body">
					    <p class="card-text">les shops</p>
					  </div>
			      
			    </div>
			 </div>
		</div>

       
    </div>




@endsection