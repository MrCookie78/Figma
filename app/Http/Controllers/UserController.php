<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateImageRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function indexProfil()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        return view('user.profil', compact('user'));
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function updateImage($id, UpdateImageRequest $request)
    {
        $parameters = $request->validated();
        $user = User::find($id);

        if (Storage::exists("public/$user->image"))
            Storage::delete("public/$user->image");

        $file = Storage::put('public', $parameters['image']);
        $parameters['image'] = substr($file, 7);
        $user->image = $parameters['image'];

        $user->save();

        return back();
    }
}
