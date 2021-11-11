@extends('layouts.layout')

@section('title')
    Demandes
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'Demandes'])

    <div class="container-sm">
        <h1>Liste des demandes</h1>

        @if (sizeof($demandes) > 0)
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $demandes->links() }}
        </div>

        <div class="row mt-3">
            @foreach($demandes as $demande)
                <div class="col-md-4 mb-3 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $demande->firstname }} {{ $demande->lastname }}</h5>
                            <p>{{ $demande->email }}</p>
                        </div>
                        <div class="card-footer w-100">
                            <form class="mt-3" method="POST" action="{{ route('demande-add') }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $demande->id }}" />
                                <input type="hidden" name="lastname" value="{{ $demande->lastname }}" />
                                <input type="hidden" name="firstname" value="{{ $demande->firstname }}" />
                                <input type="hidden" name="email" value="{{ $demande->email }}" />

                                <button type="submit" class="btn btn-primary mt-3">Accepter</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $demandes->links() }}
    </div>
@else
    <p>Il n'y a aucun article.</p>
@endif
</div>
@endsection
