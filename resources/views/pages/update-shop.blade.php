@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container py-5">
        <a href="{{ route('manage_shops') }}" class="py-5 w-25">Retour</a>
        <div class="card">
            <div class="card-header">Information du commerce <strong>{{ $shop->nom }}</strong></div>
            <div class="card-body">

                <strong>Nom:</strong> {{ $shop->nom ?? ''}}<br/>

                <strong>Adresse:</strong> {{ $shop->adresse ?? ''}}<br/>
                <strong>Adresse 2:</strong> {{ $shop->adresse2 ?? ''}}<br/>
                <strong>Code postal:</strong> {{ $shop->cp ?? ''}}<br/>
                <strong>n° Rue:</strong> {{ $shop->numRue ?? ''}}<br/>

                <strong>Latitude:</strong> {{ $shop->lat ?? ''}}<br/>
                <strong>Longitude:</strong> {{ $shop->lng ?? ''}}<br/>

                <strong>Descriptif:</strong><br> {{ $shop->descriptif ?? ''}}<br/>

                <strong>Prefix téléphone:</strong> {{ $shop->prefixeTel ?? ''}}<br/>
                <strong>Téléphone:</strong> {{ $shop->tel ?? ''}}<br/>

                <strong>Email:</strong> {{ $shop->email ?? ''}}<br/>
                <strong>SIRET:</strong> {{ $shop->siret ?? ''}}<br/>
                <strong>etat:</strong> {{ $shop->etat ?? ''}}<br/>
                <strong>codeNote:</strong> {{ $shop->codeNote ?? ''}}<br/>

                <strong>city:</strong> {{ $shop->city->nom ?? ''}}<br/>
                <strong>user:</strong> {{ $shop->user->nom ?? ''}} {{ $shop->user->prenom ?? ''}}<br/>
                <strong>subcategory:</strong> {{ $shop->subCategory->libelle ?? ''}}<br/>
                <strong>category:</strong> {{ $shop->category->libelle ?? ''}}<br/>

                <strong>url:</strong><br/>
                @forelse($shop->pictures as $pic)
                    <img src="{{ $pic->url }}" title="image {{ $pic->shop_id }}_{{ $pic->id }}">
                    @empty
                    <strong>aucune image</strong>
                @endforelse

                <hr>

                <form method="POST"
                      action="{{ route('post_update_shop', ['shop_id' => $shop->id]) }}"
                      >
                    @csrf

                    <span>0: pas valide, 2: valide</span><br/>
                    <label for="etat">Etat: </label>
                    <input type="text" name="etat" id="etat" value="{{ old('etat') ?? $shop->etat ?? ''}}" pattern="[02]{1}"><br/>

                    <label for="modifRefus">Message de Refus: </label>
                    <textarea class="form-control @error('modifRefus') is-invalid @enderror"
                              id="modifRefus"
                              name="modifRefus"
                              data-content="{{ old('modifRefus') ?? $shop->modifRefus ?? '' }}"></textarea><br/>

                    <button type="submit" class="btn btn-primary mt-5 d-block">Valider</button>
                </form>


            </div>
        </div>
    </div>
@endsection

