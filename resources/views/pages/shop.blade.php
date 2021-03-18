@extends('layouts.app')

@section('admin_scripts')
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection

@section('content')
{{--    @dump($infos->codeNote)--}}
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
        @if($average_note)
            <h3>Moyenne: <strong>{{ $average_note }}/10</strong></h3>
        @endif

        @logged
            @if($user_can_review)
                <div class="card my-5">
                    <button class="btn btn-primary py-3 d-block m-auto js-add-review-form">Ajouter un avis</button>
                    <div class="card-body px-3 js-add-review-form">
                        @include('layouts.partials.review_form', ['input_code' => true, 'update' => false])
                    </div>
                </div>
            @endif
        @endlogged

        @if($user_review)
            <div class="card my-5 border-primary pb-3">
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
                        <button class="btn btn-primary d-block m-auto my-3 js-update-review-button">Modifier</button>
                        <form method="POST"
                              action="{{ route('update_review', ['shop_id'=> $infos->id]) }}"
                              class="js-update-review-form"
                        >
                            @csrf
                            <div class="form-group">
                                <label for="note" class="mb-2 form-label text-md-right">Note (sur 10)</label>
                                <input type="number"
                                       max="10"
                                       min="0"
                                       class="form-control w-100 @error('note') is-invalid @enderror"
                                       name="note"
                                       id="note"
                                       value="{{ old('note') ?? $user_review->note  }}"
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
                                >{{ old('message') ?? $user_review->message}}</textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <button class="btn btn-primary d-block m-auto" type="submit">Valider</button>
                        </form>
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
            @if(!$user_review)
                <p>Pas encore d'avis sur ce magasin</p>
            @endif
        @endforelse

        @if($reviews)
            {{ $reviews->links() }}
        @endif

    </div>
@endsection
