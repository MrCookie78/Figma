@extends('layouts.layout')

@section('title')
    profil
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'Profil'])

    <div class="container-sm">
        <div class="row">
            <div class="col-md-6">
                <h1>{{$user->firstname}} {{$user->lastname}}</h1>
                <p>{{$user->email}}</p>
            </div>
            <div class="col-md-6">
                @if (is_file("storage/$user->image"))
                    <img class="card-img-top"
                        src="{{ asset("storage/$user->image") }}"
                        alt="Card image cap"
                        style="object-fit: contain"
                        height='250'
                    />
                @else
                    <img class="card-img-top"
                        src="{{ $user->image }}"
                        alt="Card image cap"
                        style="object-fit: contain"
                        height='250'
                    />
                @endif
            </div>
        </div>

        <hr class="solid mt-5">

        <div class="row">
            <div class="col-md-12">
                <h2 class="ms-3">Modifier mon profil :</h2>

                @if ($errors->any())
                <ul class="list-group mt-3">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form action="{{ route('profil-update', $user->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-group mb-3 ms-3 mt-3">
                                <span class="input-group-text" id="firstname">Prénom</span>
                                <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}" required aria-describedby="firstname">
                            </div>
                            <div class="input-group mb-3 ms-3 mt-3">
                                <span class="input-group-text" id="lastname">Nom</span>
                                <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" required aria-describedby="lastname">
                            </div>
                            <div class="input-group mb-3 ms-3 mt-3">
                                <span class="input-group-text" id="email">Email</span>
                                <input type="text" class="form-control" name="email" value="{{$user->email}}" required aria-describedby="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <button type="submit" class="btn btn-primary mt-3">Modifier</button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr class="solid mt-5">

                <h2 class="ms-3">Modifier mon mot de passe</h2>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form action="{{ route('profil-update-password', $user->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-group mb-3 ms-3 mt-3">
                                <span class="input-group-text" id="password">Ancien mot de passe</span>
                                <input type="password" class="form-control" name="password" required aria-describedby="password">
                            </div>
                            <div class="input-group mb-3 ms-3 mt-3">
                                <span class="input-group-text" id="newPassword">Nouveau mot de passe</span>
                                <input type="password" class="form-control" name="newPassword" required aria-describedby="newPassword">
                            </div>
                            <div class="input-group mb-3 ms-3 mt-3">
                                <span class="input-group-text" id="checkNewPassword">Réécrire votre nouveau mot de passe</span>
                                <input type="password" class="form-control" name="newPassword_confirmation" required aria-describedby="checkNewPassword">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <button type="submit" class="btn btn-primary mt-3">Modifier le mot de passe</button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr class="solid">
                <h2 class="ms-3">Modifier l'image de profil</h2>
                <form class=" mb-5" method="POST" action="{{ route('profil-update-image', $user->id) }}" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    @method("PUT")

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group ms-3">
                                <div class="form-group mt-3">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/jpg, image/svg+xml" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <button type="submit" class="btn btn-primary mt-4">Modifier l'image</button>
                            </div>
                        </div>
                    </div>
                </form>

                <form class="mt-5 mb-5" method="POST" action="{{ route('profil-delete', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>

            </div>
        </div>
    </div>
@endsection
