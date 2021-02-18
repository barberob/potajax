@extends('layouts.app')

@section('content')
	
	@foreach($shops as $shop)

		<!-- <p> {{ $shop->id }} - {{ $shop->nom }} <a href="{{ route('add-favorites') }}"> ⭐️ </a> </p> -->

		<p> {{ $shop->id }} - {{ $shop->nom }} <button class="fav"> ⭐️ </button> </p>

	@endforeach

@endsection