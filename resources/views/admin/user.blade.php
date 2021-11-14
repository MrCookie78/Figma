@extends('layouts.layout')

@section('title')
    Utilisateurs
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'Utilisateurs'])

    <div class="container-sm">
        <h1>Liste des utilisateurs</h1>

        @if (sizeof($users) > 0)
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $users->links() !!}
            </div>

            <div class="row mt-3">
                @foreach($users as $user)
                    <div class="col-md-4 mb-3 d-flex align-items-stretch">
                        <div class="card w-100">
                            @if (is_file("storage/$user->image"))
                                <img class="card-img-top"
                                    src="{{ asset("storage/$user->image") }}"
                                    alt="Card image cap"
                                    style="object-fit: cover"
                                    height='200'
                                />
                            @else
                                <img class="card-img-top"
                                    src="{{ $user->image }}"
                                    alt="Card image cap"
                                    style="object-fit: cover"
                                    height='200'
                                />
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">{{ $user->lastname }} {{ $user->firstname }}</h4>

                                <div class="d-flex mt-auto">
                                    <a class="btn btn-primary me-2" href="{{ route('profil-update', $user->id) }}">Détails</a>
                                    <form method="POST" action="{{ route('profil-delete', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $users->links() !!}
            </div>
        @else
            <p>Il n'y a aucun utilisateur.</p>
        @endif
    </div>
@endsection
