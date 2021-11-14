@extends('layouts.layout')

@section('title')
    Catégories
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'categorie'])

    <div class="container-sm">
        <h1>Ajouter une catégorie</h1>

        <form action="{{ route('categories-store') }}" method="post" class="mt-3">
            @csrf

            <div class="form-group">
                <label>Nom de la catégorie</label>
                <input type="text" class="form-control" name="nom" required />
            </div>

            <button class="btn btn-primary mt-3" type="submit">Ajouter</button>
            <a class="btn btn-danger mt-3" href="{{ route("categories-list") }}" role="button">Annuler</a>
        </form>
    </div>
@endsection
