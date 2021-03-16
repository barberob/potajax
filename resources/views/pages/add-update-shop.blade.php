@extends('layouts.app')

@section('admin_scripts')
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            Création réussie
        </div>
    @endif
    @if($errors)
        @dump($errors)
    @endif
    @if(isset($shop))
        @dump($shop->pictures)
    @endif
    <div class="container mt-5 register">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Ajouter un commerce</div>
                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('post_add_update_shop', ['id' => isset($shop->id) ? $shop->id : null]) }}"
                              enctype="multipart/form-data"
                        >
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           required
                                           autocomplete="new-name"
                                           value="{{ $shop->nom ?? ''}}"
                                    >
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Catégorie') }}</label>
                                <div class="col-md-6">
                                    <select name="category" id="category" class="js-category">
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                {{ $shop->category->id === $category->id ? 'selected' : '' }}
                                            >
                                                {{ $category->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="subcategory" class="col-md-4 col-form-label text-md-right">{{ __('Sous-Catégorie') }}</label>
                                <div class="col-md-6">
                                    <select name="subcategory" id="subcategory" class="js-subcategory">
                                        <option value="-1">--Optionel--</option>
                                        @foreach($shop->category->subCategories as $subCategory)
                                            <option
                                                value="{{ $subCategory->id }}"
                                                @if($shop->subCategory)
                                                {{$shop->subCategory->id === $subCategory->id ? 'selected' : ''}}
                                                @endif
                                            >
                                                {{ $subCategory->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">

                                @if(isset($shop->pictures))
                                <table class="table">
                                    <tbody>
                                        @foreach($shop->pictures as $picture)
                                        <tr data-picture="{{ $picture->id }}">
                                            <td align="center"><img src="{{$picture->url}}" alt="" width="100" ></td>
                                            <td align="center"><button class="btn btn-primary" data-picture="{{ $picture->id }}">Supprimer</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                                <div class="col-12 my-4 alert alert-danger js-max-pictures" style="display: none">
                                    <strong>Le nombre maximum d'images par magasin est de 4</strong>
                                </div>
                                <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>
                                <div class="col-md-6">
                                    <input id="images"
                                           type="file"
                                           multiple="multiple"
                                           accept="image/*"
                                           class="form-control js-input-picture @error('images') is-invalid @enderror"
                                           name="images[]"
                                    >
                                    @error('images')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="summary-ckeditor" name="description" data-content="{{ $shop->descriptif ?? '' }}"></textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone') }}</label>
                                <div class="col-md-6">
                                    <input id="tel"
                                           type="tel"
                                           class="form-control @error('tel') is-invalid @enderror"
                                           name="tel"
                                           required
                                           autocomplete="new-tel"
                                           value="{{ $shop->tel ?? '' }}"
                                    >
                                    @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="email"
                                           type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           required
                                           autocomplete="new-email"
                                           value="{{ $shop->email ?? ''}}"
                                    >
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="siret" class="col-md-4 col-form-label text-md-right">{{ __('Siret') }}</label>
                                <div class="col-md-6">
                                    <input id="siret"
                                           type="text"
                                           maxlength="10"
                                           class="form-control @error('siret') is-invalid @enderror"
                                           name="siret"
                                           required
                                           autocomplete="new-siret"
                                           value="{{ $shop->siret ?? '' }}"
                                    >
                                    @error('siret')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hours" class="col-md-4 col-form-label text-md-right">{{ __('Horaires') }}</label>
                                <div class="col-md-6">
                                    <textarea name="hours" id="" rows="8" class="form-control">{{ $shop->horaires ?? '
- Lundi:
- Mardi:
- Mercredi:
- Jeudi:
- Vendredi:
- Samedi:
- Dimanche:
' }}

                                    </textarea>
                                    @error('hours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adress" class="col-md-4 col-form-label text-md-right">Adresse</label>
                                <div class="col-md-6">
                                    <div class="js-input_container">
                                        <input id="adress"
                                               type="text"
                                               class="form-control js-adress @error('adress') is-invalid @enderror"
                                               name="adress"
                                               required
                                               autocomplete="off"
                                               value="{{ $shop->adresse ?? ''}}"
                                        >
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
                                    <input id="adress2"
                                           tabindex="1"
                                           type="text"
                                           class="form-control @error('adress2') is-invalid @enderror"
                                           name="adress2"
                                           autocomplete="new-adress2"
                                           value="{{ $shop->adress2 ?? '' }}"
                                    >
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
                                    <input id="street_number"
                                           type="text"
                                           class="form-control js-street_number @error('street_number') is-invalid @enderror"
                                           name="street_number"
                                           required
                                           autocomplete="new-street_number"
                                           value="{{  $shop->numRue ?? '' }}"
                                    >
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
                                    <input id="city"
                                           type="text"
                                           class="form-control js-city @error('city') is-invalid @enderror"
                                           name="city"
                                           required
                                           autocomplete="new-city"
                                           value="{{ $shop->city->nom ?? ''}}"
                                    >
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
                                    <input id="cp"
                                           type="text"
                                           class="form-control js-cp @error('cp') is-invalid @enderror"
                                           name="cp"
                                           required
                                           autocomplete="new-cp"
                                           value="{{ $shop->cp ?? '' }}"
                                    >
                                    @error('cp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" class="js-lat" name="lat" value="{{ $shop->city->lat ?? '' }}">
                            <input type="hidden" class="js-lng" name="lng" value="{{ $shop->city->lng  ?? '' }}">
                            <input type="hidden" class="js-citycode" name="citycode" value="{{ $shop->city->id ?? '' }}">

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

<script>
    CKEDITOR.replace( 'summary-ckeditor' );
    const editor = document.querySelector('#summary-ckeditor').getAttribute('data-content')
    CKEDITOR.instances['summary-ckeditor'].setData(editor)
</script>

@endsection
