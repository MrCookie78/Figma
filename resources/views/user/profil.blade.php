@extends('layouts.layout')

@section('title')
    profil
@endsection

@section('content')
    @include('layouts.navigation', ['currentPage' => 'Profil'])

    <div class="container-sm">
        <h1>Mon profil</h1>

        @if ($errors->any())
        <ul class="list-group mt-3">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form action="{{ route('profil-store', $user->id) }}" method="post">
            @csrf
            @method("PUT")

            <div class="form-group">
                <label>Prénom</label>
                <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}" required/>
            </div>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" required/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}" required/>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Modifier</button>
        </form>

        <form action="" method="post" class="mt-5">
            @csrf
            @method("PUT")

            <div class="form-group">
                <label>Ancien mot de passe</label>
                <input type="password" class="form-control" name="password" required/>
            </div>
            <div class="form-group">
                <label>Nouveau mot de passe</label>
                <input type="password" class="form-control" name="newPassword" required/>
            </div>
            <div class="form-group">
                <label>Réécrire votre nouveau mot de passe</label>
                <input type="password" class="form-control" name="checkNewPassword" required/>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Modifier le mot de passe</button>
        </form>

        <form class="mt-3" method="POST" action="" enctype="multipart/form-data" class="mt-5">
            @csrf
            @method("PUT")

            <div class="form-group mt-3">
                <label>Image</label>
                <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/jpg, image/svg+xml" required />
            </div>
            <button type="submit" class="btn btn-warning mt-3">Modifier</button>
        </form>

    </div>
@endsection
