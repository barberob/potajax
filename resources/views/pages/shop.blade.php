@extends('layouts.app')

@section('admin_scripts')
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection

@section('content')
    @dump($infos->codeNote)
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



    <div class="container col-md-6 col-sm-12">
        @if($reviews)
            <h3>Moyenne: <strong>{{ $average_note }}</strong></h3>
        @endif
        @if($user_review)
            <div class="card my-5 border-primary">
                <div class="card card-header flex-row justify-content-between">
                    <h4>Vous</h4>
                    <form method="POST" action="{{ route('delete_review', ['review_id' => $user_review->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
                <div class="card-body">
                    <p class="pb-3">{{ $user_review->message }}</p>
                    <p class="font-weight-bold">Note: {{ $user_review->note }}/10</p>
                </div>
                @if(!$user_can_review)
                    <div class="col-md-10 d-block m-auto">
                        <h3 class="d">Modifier</h3>
                        @include('layouts.partials.review_form', ['input_code' => false, 'update' => true])
                    </div>
                @endif
            </div>
        @endif

        @forelse($reviews as $review)
            <div class="card my-3">
                <div class="card card-header">
                    <h4>{{ $review->user->prenom }}</h4>
                </div>
                <div class="card-body">
                    <p class="pb-3">{{ $review->message }}</p>
                    <p class="font-weight-bold">Note: {{ $review->note }}/10</p>
                </div>
            </div>
        @empty
            <p>Pas encore d'avis sur ce magasin</p>
        @endforelse
        @if($reviews)
            {{ $reviews->links() }}
        @endif

        @logged
            @if($user_can_review)
                <div class="card my-5">
                    <div class="card-header">
                        <h3 class="font-weight-bold ">Ajouter un avis</h3>
                    </div>
                    <div class="card-body px-3">
                        @include('layouts.partials.review_form', ['input_code' => true, 'update' => false])
                    </div>
                </div>
            @endif
        @endlogged
    </div>
@endsection
