@extends('layouts.app')

@section('content')

<div class="name" style="background-image:url('../img/{{$img}}.jpg');">
	<div>
		<h2 class="title">{{ $infos->nom }}</h2>
		<p class="adresse">{{$infos->adresse}}</p>
		<p class="tel">Téléphone: {{$infos->tel}}</p>
		<p class="mail">@: {{$infos->email}}</p>

		<a class="btn btn-outline-warning btn-sm" href="#" role="button">Ajouter aux favoris</a>
	</div>
</div>
<div class="horaires">
	<p> Ouvert les : {{$infos->horaires}}</p>
</div>
<div class="descriptif">
	<p>{{$infos->descriptif}}</p>
</div>

@endsection