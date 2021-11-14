@extends('layouts.layout')

@section('title')
    Catégories
@endsection

@section('content')
@include('layouts.navigation', ['currentPage' => 'categorie'])

    <div class="container-sm">
        <h1>Les Catégories</h1>

        @if (\Illuminate\Support\Facades\Auth::check())
            <a class="btn btn-primary mt-3" href="{{ route('categories-add') }}" role="button">Ajouter</a>
        @endif

        <ul class="mt-3">
            @foreach ($categories as $category)
                <li class="d-flex flex-row align-items-center mb-1">
                    <form action="{{ route('categories-update', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-row align-items-center">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nom" value="{{ $category->nom }}" required />
                            </div>
                            <button class="btn btn-warning btn-sm ms-2" type="submit">Modifier</button>
                        </div>
                    </form>

                    <form action="{{ route('categories-delete', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ms-2">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
