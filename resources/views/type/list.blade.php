@extends('layouts.layout')

@section('title')
    Types
@endsection

@section('content')
@include('layouts.navigation', ['currentPage' => 'type'])

    <div class="container-sm">
        <h1>Les Types</h1>

        @if (\Illuminate\Support\Facades\Auth::check())
            <a class="btn btn-primary mt-3" href="{{ route('types-add') }}" role="button">Ajouter</a>
        @endif

        <ul class="mt-3">
            @foreach ($types as $type)
                <li class="d-flex flex-row align-items-center mb-1">
                    <form action="{{ route('types-update', $type->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-row align-items-center">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nom" value="{{ $type->nom }}" required />
                            </div>
                            <button class="btn btn-warning btn-sm ms-2" type="submit">Modifier</button>
                        </div>
                    </form>

                    <form action="{{ route('types-delete', $type->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ms-2">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
