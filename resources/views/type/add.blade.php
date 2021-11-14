@extends('layouts.layout')

@section('title')
    Types
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'type'])

    <div class="container-sm">
        <h1>Ajouter un type</h1>

        <form action="{{ route('types-store') }}" method="post" class="mt-3">
            @csrf

            <div class="form-group">
                <label>Nom du type</label>
                <input type="text" class="form-control" name="nom" required />
            </div>

            <button class="btn btn-primary mt-3" type="submit">Ajouter</button>
            <a class="btn btn-danger mt-3" href="{{ route("types-list") }}" role="button">Annuler</a>
        </form>
    </div>
@endsection
