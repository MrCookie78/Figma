@extends('layouts.layout')

@section('title')
    Formations
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'Formations'])

    <div class="container-sm">
        <h1>La liste des formations</h1>

        {{-- @if (\Illuminate\Support\Facades\Auth::check())
            <a class="btn btn-primary mt-3" href="{{ route('post-add') }}" role="button">Ajouter</a>
        @endif --}}


        @if (sizeof($formations) > 0)
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {{ $formations->links() }}
            </div>

            <div class="row mt-3">
                @foreach($formations as $formation)
                    <div class="col-md-4 mb-3 d-flex align-items-stretch">
                        <div class="card w-100">
                            {{-- <img class="card-img-top"
                                src="{{ asset("storage/$post->picture") }}"
                                alt="Card image cap"
                                style="object-fit: cover"
                                height='200'
                            /> --}}
                            <img class="card-img-top"
                                src="{{ $formation->image }}"
                                alt="Card image cap"
                                style="object-fit: cover"
                                height='200'
                            />
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $formation->titre }}</h5>

                                @if ($formation->user_id)
                                    <p>Crée par {{ $formation->user->lastname }} {{ $formation->user->firstname }}</p>
                                @endif
                                <div class="mb-3">
                                    @foreach ($formation->categories as $categorie)
                                        <span class="badge bg-secondary">{{ $categorie->nom }}</span>
                                    @endforeach
                                </div>
                                <div class="mb-3">
                                    @foreach ($formation->types as $type)
                                        <span class="badge bg-secondary">{{ $type->nom }}</span>
                                    @endforeach
                                </div>
                                <div class="d-flex mt-auto">
                                    <a class="btn btn-primary me-2" href="{{ route('formation-detail', $formation->id) }}">Détails</a>
                                    {{-- <form method="POST" action="{{ route('post-delete', $post->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {{ $formations->links() }}
            </div>
        @else
            <p>Il n'y a aucun article.</p>
        @endif
    </div>
@endsection
