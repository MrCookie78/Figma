@extends('layouts.layout')

@section('title')
    Détail de la formation
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'Détail de formation'])

    <div class="container-sm">

        {{-- @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id === $formation->user_id)) --}}
            <h1>Détail de la formation {{$formation->titre}}</h1>
            @if ($errors->any())
                <ul class="list-group mt-3">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <form class="mt-3" method="POST" action="{{ route('formation-update', $formation->id) }}">
                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label for="inputTitre">Titre</label>
                            <input type="text" class="form-control" id="inputTitre" name="titre" value="{{ old('titre', $formation->titre) }}" placeholder="Entrer un titre">
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputDesc">Description</label>
                            <textarea type="text" class="form-control" id="inputDesc" name="description" placeholder="Enter Description">{{ old('description', $formation->description) }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputPrix">Prix</label>
                            <input type="number" class="form-control" id="inputPrix" name="prix" value="{{ old('prix', $formation->prix) }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputExtrait">Ecrit le {{ $formation->created_at->format('d/m/Y') }}</label>
                        </div>

                        <label class="mt-3">Catégories de l'article</label>
                        <div>
                            @foreach ($categories as $categorie)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="check-categorie-{{ $categorie->id }}" name="checkboxCategories[{{ $categorie->id }}]" value="{{ $categorie->id }}" @if($formation->categories->contains('id', $categorie->id)) checked @endif/>
                                    <label for="check-{{ $categorie->id }}" class="form-check-label">{{ $categorie->nom }}</label>
                                </div>
                            @endforeach
                        </div>
                        <label class="mt-3">Types de l'article</label>
                        <div>
                            @foreach ($types as $type)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="check-type-{{ $type->id }}" name="checkboxTypes[{{ $type->id }}]" value="{{ $type->id }}" @if($formation->types->contains('id', $type->id)) checked @endif/>
                                    <label for="check-type-{{ $type->id }}" class="form-check-label">{{ $type->nom }}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-warning mt-3">Modifier</button>
                        <a class="btn btn-success mt-3" href="{{ route('formation-list') }}" role="button">Retour</a>
                    </form>

                    <div>
                        <h2>Chapitres de la formation</h2>
                        @foreach ($formation->chapitres as $chapitre)
                            <div>
                                <h3>{{$chapitre->titre}}</h3>
                                <p>{{$chapitre->duree}}</p>
                                <div>{{$chapitre->contenu}}</div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="col-md-6">
                    <form class="mt-3" method="POST" action="{{ route('formation-update-image', $formation->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="form-group mt-3">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/jpg, image/svg+xml" required />
                        </div>
                        <button type="submit" class="btn btn-warning mt-3">Modifier</button>
                    </form>
                </div>
            </div>

            <form class="mt-3" method="POST" action="{{ route('formation-delete', $formation->id) }}">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger mt-3">Supprimer cette formation</button>
            </form>
        {{-- @else --}}
            {{-- <h1>{{$formation->titre}}</h1>
            <div>
                <h2>Description</h2>
                <p>{{$formation->description}}</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <ul>
                        @foreach ($formation->chapitres as $chapitre)
                            <li>{{$chapitre->titre}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif --}}



        {{-- <form method="post" action="{{ route('comment-add', $post->id) }}">
            @csrf

            <div class="form-group">
                <label>Votre commentaire</label>
                <input type="text" class="form-control" name="content" required />
            </div>
            <button type="submit" class="btn btn-primary">Ajouter ce commentaire</button>
        </form> --}}
    </div>
    @endsection
