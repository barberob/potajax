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

        <a class="btn btn-outline-warning btn-sm fav" href="#" role="button" data-id="{{ $infos->id }}" id="favorite">
            Ajouter aux favoris
        </a>

	</div>
</div>
<div class="horaires">
	<p> Ouvert les : {{$infos->horaires}}</p>
</div>
<div class="descriptif">
	<p>{{$infos->descriptif}}</p>
</div>

    <div class="container col-6">
        @forelse($infos->reviews as $review)
            <div class="card">
                <div class="card-header">
                    <h3>{{ $review->user->name}}</h3>
                </div>
                <div class="card-body">
                    <p>{{ $review->message }}</p>
                    <p>{{ $review->note }}</p>
                </div>
            </div>
        @empty
            <p>Pas encore d'avis sur ce magasin</p>
        @endforelse
        <div class="card my-5">
            <div class="card-header">
                <h2>Ajouter un avis</h2>
            </div>
            <div class="card-body px-3">
                <form method="POST" action="{{ route('add_review', ['shop_id' => $infos->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="code" class="mb-2 form-label text-md-right">Code d'ajout</label>
                        <p class="py-2 font-weight-bold">Veuilez demander ce code au magasin</p>
                        <input type="text" max="10" min="0" class="form-control w-100" name="code" id="code">
                    </div>

                    <div class="form-group">
                        <label for="note" class="mb-2 form-label text-md-right">Note (sur 10)</label>
                        <input type="number" max="10" min="0" class="form-control w-100" name="note" id="note">
                    </div>

                    <div class="form-group">
                        <label for="message" class="mb-2 form-label text-md-right">Message</label>
                        <textarea name="message" class="w-100 d-block p-3" id="message" cols="30" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary m-auto d-block">Valider</button>
                </form>
            </div>
        </div>
    </div>


@endsection
