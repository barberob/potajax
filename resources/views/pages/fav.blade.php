@extends('layouts.app')


@section('content')

    <!-- <div class="home text-center">
        Coucou je suis un favoris
    </div> -->
    @if(count($shops) == 0)
    	<h1 class="text-center"> Vous n'avez aucun commerce en favoris, ajoutez-en ! </h1>
    @else
    	<h1 class="text-center"> Vos commerces favoris : </h1>
    	<ul class="list-group list-group-flush">
	    @foreach($shops as $shop)
	    	
			  <li class="list-group-item">{{ $shop->name }}</li>
			

	    @endforeach
	    </ul>
	@endif

@endsection
