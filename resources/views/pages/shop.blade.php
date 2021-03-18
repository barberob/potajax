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

    <div class="container col-6">
        <h3>Avis</h3>
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

        @logged
        @if($user_can_review))
        <div class="card my-5">
            <div class="card-header">
                <h3 class="font-weight-bold ">Ajouter un avis</h3>
            </div>
            <div class="card-body px-3">
                <form method="POST" action="{{ route('add_review', ['shop_id' => $infos->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="code" class="mb-2 form-label text-md-right">Code d'ajout</label>
                        <p class="py-2 font-weight-bold">Veuilez demander ce code au magasin</p>
                        <input type="text"
                               class="form-control w-100 @if(Session::has('wrong_code')) is-invalid @endif"
                               name="code"
                               id="code"
                               value="{{ old('code') }}"
                        >
                        @if(Session::has('wrong_code'))
                            <span class="invalid-feedback" role="alert">
                            <strong>Le code n'est pas valide</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="note" class="mb-2 form-label text-md-right">Note (sur 10)</label>
                        <input type="number"
                               max="10"
                               min="0"
                               class="form-control w-100 @error('note') is-invalid @enderror"
                               name="note"
                               id="note"
                               value="{{ old('note') }}"
                        >
                        @error('note')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message" class="mb-2 form-label text-md-right">Message</label>
                        <textarea name="message"
                                  class="w-100 d-block p-3 @error('message') is-invalid @enderror"
                                  id="message"
                                  cols="30"
                                  rows="10"
                        >{{ old('message') }}</textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary m-auto d-block">Valider</button>
                </form>
            </div>
        </div>
        @endif
        @endlogged
    </div>
@endsection
