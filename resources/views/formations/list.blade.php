@extends('layouts.layout')

@section('title')
    Formations
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'Formations'])

    <div class="container-sm">
        <h1>Liste des formations</h1>

        @auth
            @if (\Illuminate\Support\Facades\Auth::user()->isAdmin)
                <a class="btn btn-primary mt-3" href="{{ route('formation-add') }}" role="button">Ajouter</a>
            @endif
        @endauth

        @if (sizeof($formations) > 0)
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $formations->links() !!}
            </div>

            <div class="row mt-3">
                @foreach($formations as $formation)
                    <div class="col-md-4 mb-3 d-flex align-items-stretch">
                        <div class="card w-100">
                            @if (is_file("storage/$formation->image"))
                                <img class="card-img-top"
                                    src="{{ asset("storage/$formation->image") }}"
                                    alt="Card image cap"
                                    style="object-fit: cover"
                                    height='200'
                                />
                            @else
                                <img class="card-img-top"
                                    src="{{ $formation->image }}"
                                    alt="Card image cap"
                                    style="object-fit: cover"
                                    height='200'
                                />
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">{{ $formation->titre }}</h4>

                                @if ($formation->user_id)
                                    <p>Crée par {{ $formation->user->lastname }} {{ $formation->user->firstname }}</p>
                                @endif

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

                                <div class="d-flex mt-auto">
                                    <a class="btn btn-primary me-2" href="{{ route('formation-detail', $formation->id) }}">Détails</a>

                                    @auth
                                        @if (\Illuminate\Support\Facades\Auth::user()->isAdmin)
                                            <form method="POST" action="{{ route('formation-delete', $formation->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        @endif
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $formations->links() !!}
            </div>
        @else
            <p>Il n'y a aucune formation.</p>
        @endif
    </div>
@endsection
