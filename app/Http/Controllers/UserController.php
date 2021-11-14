<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateImageRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $formations = $user->formation;
        return view('user.formations', compact('formations'));
    }

    public function indexProfil($id)
    {
        $user = User::find($id);
        return view('user.profil', compact('user'));
    }

    public function update($id, UserUpdateRequest $request)
    {
        $user = User::find($id);
        $params = $request->validated($user);
        $user->update($params);
        return back();
    }

    public function updatePassword($id, Request $request)
    {
        $user = User::find($id);
        /*
        * Validate all input fields
        */
        $this->validate($request, [
            'password' => 'required',
            'newPassword' => 'required|confirmed|different:password|min:5'
        ]);

        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->newPassword)
            ])->save();

            $request->session()->flash('success', 'Mot de passe modifié');
            return back();
        } else {
            $request->session()->flash('error', 'Les mots de passe ne correspondent pas');
            return back();
        }
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

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }
}
