@extends('layouts.app')

@section('content')
{{--    @if($errors)--}}
{{--        @dump($errors)--}}
{{--    @endif--}}
    <div class="container mt-5 register">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter un commerce</div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group row">
                                <label for="adress" class="col-md-4 col-form-label text-md-right">Adresse</label>
                                <div class="col-md-6">
                                    <div class="js-input_container">
                                        <input id="adress" tabindex="1" type="text" class="form-control js-adress @error('adress') is-invalid @enderror" name="adress" required autocomplete="off">
                                        <ul class="js-autocomplete js-hidden">
                                        </ul>
                                    </div>
                                    @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adress2" class="col-md-4 col-form-label text-md-right">Adresse ligne 2</label>
                                <div class="col-md-6">
                                    <div class="js-input_container">
                                        <input id="adress2" tabindex="1" type="text" class="form-control @error('adress2') is-invalid @enderror" name="adress2" autocomplete="new-adress2">
                                        <ul class="js-autocomplete js-hidden">
                                        </ul>
                                    </div>
                                    @error('adress2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street_number" class="col-md-4 col-form-label text-md-right">Numéro de rue</label>
                                <div class="col-md-6">
                                    <input id="street_number" tabindex="1" type="text" class="form-control js-street_number @error('street_number') is-invalid @enderror" name="street_number" required autocomplete="new-street_number">
                                    @error('street_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">Ville</label>
                                <div class="col-md-6">
                                    <input id="city" tabindex="1" type="text" class="form-control js-city @error('city') is-invalid @enderror" name="city" required autocomplete="new-city">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cp" class="col-md-4 col-form-label text-md-right">Code postal</label>
                                <div class="col-md-6">
                                    <input id="cp" tabindex="1" type="text" class="form-control js-cp @error('cp') is-invalid @enderror" name="cp" required autocomplete="new-cp">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
