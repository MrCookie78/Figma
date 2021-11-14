<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapitreStoreRequest;
use App\Http\Requests\ChapitreUpdateRequest;
use App\Models\Chapitre;
use App\Models\Formation;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    public function index($id)
    {
        // dd(\Illuminate\Support\Facades\Auth::user());
        $formation = Formation::find($id);
        return view('formations.ajoutChapitre', compact('formation'));
    }

    public function store($id, ChapitreStoreRequest $request)
    {
        $parameters = $request->validated();
        Chapitre::create($parameters);

        return redirect()->route('formation-detail', $id);
    }

    public function update($id, $chapitreId, ChapitreUpdateRequest $request)
    {
        $parameters = $request->validated();

        $chapitre = Chapitre::find($chapitreId);
        $chapitre->update($parameters);

        return back();
    }

    public function delete($id, $chapitreId)
    {
        $chapitre = Chapitre::find($chapitreId);
        $chapitre->delete();
        return redirect()->route('formation-detail', $id);
    }
}
