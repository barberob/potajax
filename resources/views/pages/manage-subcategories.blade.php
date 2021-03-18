@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-3">Ajouter des sous-catégories</h1>
        <div class="card">
            <div class="card-header">{{ $category->libelle }}</div>
            <div class="card-body">
                <form method="POST"
                      action="{{ route('post_add_subcategories', ['category_id' => $category->id]) }}"
                      class="mx-3 col-md-12"
                >
                    <div class="js-inputs-container">
                        @csrf
                        @foreach($subcategories as $key => $subcategory)
                            <div class="form-group row">
                                <label for="{{ 'subcategory_'.$key }}" class="mb-2 form-label text-md-right mr-2">Nom</label>
                                <input type="text"
                                       class="form-control col-md-6 js-count"
                                       name="{{ 'subcategory_'.$key }}"
                                       id="{{ 'subcategory_'.$key }}"
                                       value="{{ $subcategory->libelle }}"
                                       disabled
                                >
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-primary mx-1 js-add-row-button">+</button>
                    <button type="submit" class="btn btn-primary mt-5 d-block mx-auto">Valider</button>
                </form>
            </div>
        </div>
    </div>
@endsection
