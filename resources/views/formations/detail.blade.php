@extends('layouts.layout')

@section('title')
    Détail de la formation
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'Détail de formation'])

    <div class="container-md">

        <div class="row">
            <div class="col-md-1">
                <a class="btn btn-success mt-3" href="{{ route('formation-list') }}" role="button">Retour</a>
            </div>
        </div>

        @if (\Illuminate\Support\Facades\Auth::check() && (\Illuminate\Support\Facades\Auth::user()->id === $formation->user_id || \Illuminate\Support\Facades\Auth::user()->isAdmin))


            <h1 class="mt-3">Détails de la formation {{$formation->titre}}</h1>
            @if ($formation->user_id)
                <p>Formation proposé par {{ $formation->user->lastname }} {{ $formation->user->firstname }}</p>
            @endif
            @if ($errors->any())
                <ul class="list-group mt-3">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <form class="mb-3" method="POST" action="{{ route('formation-update', $formation->id) }}">
                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label for="inputTitre"><strong>Titre</strong></label>
                            <input type="text" class="form-control" id="inputTitre" name="titre" value="{{ old('titre', $formation->titre) }}" placeholder="Entrer un titre">
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputDesc"><strong>Description</strong></label>
                            <textarea type="text" class="form-control" id="inputDesc" name="description" rows="5" placeholder="Enter Description">{{ old('description', $formation->description) }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputPrix"><strong>Prix</strong></label>
                            <input type="number" class="form-control" id="inputPrix" name="prix" value="{{ old('prix', $formation->prix) }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputExtrait"><strong>Ecrit le {{ $formation->created_at->format('d/m/Y') }}</strong></label>
                        </div>

                        <label class="mt-3"><h5>Catégories de l'article</h5></label>
                        <div>
                            @foreach ($categories as $categorie)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="check-categorie-{{ $categorie->id }}" name="checkboxCategories[{{ $categorie->id }}]" value="{{ $categorie->id }}" @if($formation->categories->contains('id', $categorie->id)) checked @endif/>
                                    <label for="check-{{ $categorie->id }}" class="form-check-label">{{ $categorie->nom }}</label>
                                </div>
                            @endforeach
                        </div>
                        <label class="mt-3"><h5>Types de l'article</h5></label>
                        <div>
                            @foreach ($types as $type)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="check-type-{{ $type->id }}" name="checkboxTypes[{{ $type->id }}]" value="{{ $type->id }}" @if($formation->types->contains('id', $type->id)) checked @endif/>
                                    <label for="check-type-{{ $type->id }}" class="form-check-label">{{ $type->nom }}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-warning mt-3">Modifier</button>
                    </form>
                </div>
            </div>

            <div class="row mt-5 mb-5">
                <div class="col-md-7">
                    <h2>Modifier l'image de la formation</h2>
                    <form class="mb-3" method="POST" action="{{ route('formation-update-image', $formation->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="form-group mt-3">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/jpg, image/svg+xml" required />
                        </div>
                        <button type="submit" class="btn btn-warning mt-3">Modifier</button>
                    </form>
                </div>
                <div class="col-md-4 offset-1">
                    @if (is_file("storage/$formation->image"))
                        <img class="card-img-top"
                            src="{{ asset("storage/$formation->image") }}"
                            alt="Card image cap"
                            style="object-fit: contain"
                            height='250'
                        />
                    @else
                        <img class="card-img-top"
                            src="{{ $formation->image }}"
                            alt="Card image cap"
                            style="object-fit: contain"
                            height='250'
                        />
                    @endif
                </div>
            </div>

            <hr class="solid">

            <div class="row">
                <div class="col-md-12 mt-3 mb-5">
                    <h2 class="text-center">Chapitres de la formation</h2>
                    <a class="btn btn-primary mt-3" href="{{ route('chapitre-form', ['id' => $formation->id]) }}" role="button">Ajouter</a>
                    @foreach ($formation->chapitres as $chapitre)
                        <div class="ms-5 me-5 pt-3">
                            <hr class="solid">

                            <form class="mb-3" method="POST" action="{{ route('chapitre-update', ['id' => $formation->id, 'chapitreId' => $chapitre->id] ) }}">
                                @csrf
                                @method("PUT")

                                <div class="form-group">
                                    <label for="inputTitre"><strong>Titre</strong></label>
                                    <input type="text" class="form-control" id="inputTitre" name="titre" value="{{ old('titre', $chapitre->titre) }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="inputDuree"><strong>Durée</strong></label>
                                    <input type="time" class="form-control" id="inputDuree" name="duree" value="{{ old('duree', $chapitre->duree) }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="inputDesc"><strong>Contenu</strong></label>
                                    <textarea type="text" class="form-control" id="inputDesc" name="contenu" rows="5">{{ old('contenu', $chapitre->contenu) }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-warning mt-3">Modifier</button>
                            </form>
                            <form method="POST" action="{{ route('chapitre-delete', ['id' => $formation->id, 'chapitreId' => $chapitre->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>



            <form class="mt-3" method="POST" action="{{ route('formation-delete', $formation->id) }}">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger mt-3">Supprimer cette formation</button>
            </form>
        @else

            <div class="row mt-3">
                <div class="col-md-8">
                    <h1>{{$formation->titre}}</h1>
                    @if ($formation->user_id)
                        <p>Formation proposé par {{ $formation->user->lastname }} {{ $formation->user->firstname }}</p>
                    @endif

                    <p>Durée de la formation : <strong>{{$formation->sumDureeChapitre()}}</strong></p>

                    <p>Coût de la formation : <strong>{{$formation->prix}}€</strong></p>

                    @if (sizeof($formation->categories) > 0)
                        <div class="mb-3">
                            <h5>Catégories</h5>
                            @foreach ($formation->categories as $categorie)
                                <span class="badge bg-secondary">{{ $categorie->nom }}</span>
                            @endforeach
                        </div>
                    @endif

                    @if (sizeof($formation->types) > 0)
                        <div class="mb-3">
                            <h5>Types</h5>
                            @foreach ($formation->types as $type)
                                <span class="badge bg-secondary">{{ $type->nom }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    @if (is_file("storage/$formation->image"))
                        <img class="card-img-top"
                            src="{{ asset("storage/$formation->image") }}"
                            alt="Card image cap"
                            style="object-fit: contain"
                            height='250'
                        />
                    @else
                        <img class="card-img-top"
                            src="{{ $formation->image }}"
                            alt="Card image cap"
                            style="object-fit: contain"
                            height='250'
                        />
                    @endif
                </div>
            </div>

            <div class="row mt-5">
                <h2>Description</h2>
                <p>{{$formation->description}}</p>
            </div>

            <hr class="solid">

            <div class="row">
                <div class="col-md-12 mt-3 mb-5">
                    <h2 class="text-center">Chapitres de la formation</h2>
                    @foreach ($formation->chapitres as $chapitre)
                        <div class="ms-5 me-5 pt-3">
                            <hr class="solid">
                            <h3>{{$chapitre->titre}}</h3>
                            <p>Durée du chapitre : <strong>{{$formation->heureFormat($chapitre->duree)}}</strong></p>
                            <div>
                                <h3 class="mb-3">Contenu</h3>
                                {!!$chapitre->contenu!!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
