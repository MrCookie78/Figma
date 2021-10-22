@extends('layouts.layout')

@section('title')
    Détail de la formation
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'Détail de formation'])

    <div class="container-sm">

        @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id === $formation->user_id))
            <h1>Détail d'un article</h1>
            @if ($errors->any())
                <ul class="list-group mt-3">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {{-- <div class="row">
                <div class="col-md-6">
                    <form class="mt-3" method="POST" action="">
                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label for="inputTitle">Titre</label>
                            <input type="text" class="form-control" id="inputTitle" name="title" value="{{ old('title', $post->title) }}" placeholder="Enter Title">
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputDesc">Description</label>
                            <textarea type="text" class="form-control" id="inputDesc" name="description" placeholder="Enter Description">{{ old('description', $post->description) }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputExtrait">Extrait</label>
                            <input type="text" class="form-control" id="inputExtrait" name="extrait" value="{{ old('extrait', $post->extrait) }}" placeholder="Enter Extrait">
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputExtrait">Ecrit le {{ $post->created_at->format('d/m/Y') }}</label>
                        </div>

                        <div>
                            @foreach ($categories as $category)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="check-{{ $category->id }}" name="checkboxCategories[{{ $category->id }}]" value="{{ $category->id }}" @if($post->categories->contains('id', $category->id)) checked @endif />
                                    <label for="check-{{ $category->id }}" class="form-check-label">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-warning mt-3">Modifier</button>
                        <a class="btn btn-success mt-3" href="{{ route('posts') }}" role="button">Retour</a>
                    </form>
                </div>

                <div class="col-md-6">
                    <form class="mt-3" method="POST" action="{{ route('post-update-picture', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="form-group mt-3">
                            <label>Image</label>
                            <input type="file" class="form-control" name="picture" accept="image/png, image/jpeg, image/jpg, image/svg+xml" required />
                        </div>
                        <button type="submit" class="btn btn-warning mt-3">Modifier</button>
                    </form>
                </div>
            </div>

            <form class="mt-3" method="POST" action="{{ route('post-delete', $post->id) }}">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger mt-3">Supprimer cette Article</button>
            </form> --}}
        @else
            <h1>{{$formation->titre}}</h1>
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
        @endif



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
