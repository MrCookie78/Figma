<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemandeStoreRequest;
use App\Mail\demandeAccepteMail;
use App\Mail\DemandeMail;
use App\Models\InscriptionDemande;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = InscriptionDemande::orderBy('id', 'DESC')->paginate(9);
        return view('admin.demande', compact('demandes'));
    }

    public function storeAndSend(DemandeStoreRequest $request)
    {
        $params = $request->validated();
        InscriptionDemande::create($params);
        Mail::to('admin@test.com')
            ->send(new DemandeMail($params));
        return redirect()->route('formation-list');
    }

    public function addUser(Request $request)
    {
        dd(now());
        $params = $request->all();

        $password = Str::random(8);
        $hashed__password = Hash::make($password);

        $params["password"] = $password;
        $demande = InscriptionDemande::find($params["id"]);
        $demande->delete();

        $paramsUser = array();
        $paramsUser["firstname"] = $params["firstname"];
        $paramsUser["lastname"] = $params["lastname"];
        $paramsUser["email"] = $params["email"];
        $paramsUser["password"] = $hashed__password;
        User::create($paramsUser);

        Mail::to($params["email"])
            ->send(new demandeAccepteMail($params));

        return redirect()->back();
    }
}
