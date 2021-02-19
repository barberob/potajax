@extends('layouts.app')

@section('admin_scripts')
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection

@section('content')

<div class="name" style="background-image:url('../img/Size_Hight/{{$img}}.jpg');">
	<div>
		<a id="back" type="button" class="btn btn-outline-danger btn-circle" href="{{ route('Catmap', ['category_id' => $infos->category_id]) }}"><</a>
		<h2 class="title">{{ $infos->nom }}</h2>
		<p class="adresse">{{$infos->adresse}}</p>
		<p class="tel">Téléphone: {{$infos->tel}}</p>
		<p class="mail">@: {{$infos->email}}</p>

		<a class="btn btn-outline-warning btn-sm fav" href="#" role="button">Ajouter aux favoris</a>
	</div>
</div>
<div class="horaires">
	<p> Ouvert les : {{$infos->horaires}}</p>
</div>
<div class="descriptif">
	<p>{{$infos->descriptif}}</p>
	<textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
</div>


<script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>

@endsection
