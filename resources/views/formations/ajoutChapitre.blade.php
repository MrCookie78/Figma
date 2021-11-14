@extends('layouts.layout')

@section('title')
    Ajout d'un chapitre
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'Ajout chapitre'])

    <div class="container-sm">
        <h1>{{$formation->titre}}</h1>
        <h2>Ajout d'un chapitre</h2>

        <form class="mb-3" method="POST" action="{{ route('chapitre-add', ['id' => $formation->id] ) }}">
            @csrf

            <div class="form-group">
                <label for="inputTitre"><strong>Titre</strong></label>
                <input type="text" class="form-control" id="inputTitre" name="titre" placeholder="Titre du chapitre">
            </div>

            <div class="form-group mt-3">
                <label for="inputDuree"><strong>Durée</strong></label>
                <input type="time" class="form-control" id="inputDuree" name="duree">
            </div>

            <div class="form-group mt-3">
                <label for="inputDesc"><strong>Contenu</strong></label>
                <textarea type="text" class="form-control" id="inputDesc" name="contenu" rows="5"></textarea>
            </div>

            <input type="hidden" name="formation_id" value="{{$formation->id}}">

            <button type="submit" class="btn btn-success mt-3">Ajouter</button>
        </form>
    </div>

@endsection
