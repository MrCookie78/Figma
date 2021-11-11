@extends('layouts.layout')

@section('title')
    Ajouter une formation
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'ajout-formation'])

    <div class="container-sm">
        <h1>Ajout d'une formation</h1>

        @if ($errors->any())
            <ul class="list-group mt-3">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form class="mt-3" method="POST" action="{{ route('formation-store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Titre</label>
                <input type="text" class="form-control" name="titre" value="{{ old('titre') }}" placeholder="Entrer un titre" required />
            </div>
            <div class="form-group mt-3">
                <label>Description</label>
                <textarea type="text" class="form-control" name="description" placeholder="Entrer une description" required>{{ old('description') }}</textarea>
            </div>
            <div class="form-group mt-3">
                <label>Prix</label>
                <input type="number" class="form-control" name="prix" value="{{ old('prix') }}" placeholder="Entrer un prix" required />
            </div>
            <div class="form-group mt-3">
                <label>Image</label>
                <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/jpg, image/svg+xml" required />
            </div>

            <label class="mt-3">Catégories de l'article</label>
            <div>
                @foreach ($categories as $categorie)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="check-categorie-{{ $categorie->id }}" name="checkboxCategories[{{ $categorie->id }}]" value="{{ $categorie->id }}" />
                        <label for="check-{{ $categorie->id }}" class="form-check-label">{{ $categorie->nom }}</label>
                    </div>
                @endforeach
            </div>
            <label class="mt-3">Types de l'article</label>
            <div>
                @foreach ($types as $type)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="check-type-{{ $type->id }}" name="checkboxTypes[{{ $type->id }}]" value="{{ $type->id }}" />
                        <label for="check-type-{{ $type->id }}" class="form-check-label">{{ $type->nom }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
            <a class="btn btn-danger mt-3" href="" role="button">Annuler</a>
        </form>
    </div>
@endsection
