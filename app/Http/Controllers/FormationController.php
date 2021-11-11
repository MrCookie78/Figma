<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationStoreRequest;
use App\Http\Requests\FormationUpdateRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Categorie;
use App\Models\Formation;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    public function index()
    {
        // dd(\Illuminate\Support\Facades\Auth::user());
        $formations = Formation::orderBy('id', 'DESC')->paginate(9);
        return view('formations.list', compact('formations'));
    }

    public function detail($id = null)
    {
        $formation = Formation::find($id);
        $categories = Categorie::all();
        $types = Type::all();
        return view('formations.detail', compact(['formation', 'categories', 'types']));
    }

    public function add()
    {
        $categories = Categorie::all();
        $types = Type::all();
        return view('formations.ajout', compact('categories', 'types'));
    }

    public function store(FormationStoreRequest $request)
    {
        $parameters = $request->validated();
        $file = Storage::put('public', $parameters['image']);

        // On enlève le "public/" de "public/<nom_fichier>.<extension>"
        $parameters['image'] = substr($file, 7);

        // $parameters['user_id'] = auth()->user()->id;
        $parameters['user_id'] = 1;
        $formation = Formation::create($parameters);
        if (!empty($parameters['checkboxCategories'])) {
            $formation->categories()->attach($parameters['checkboxCategories']);
        }
        if (!empty($parameters['checkboxCategories'])) {
            $formation->categories()->attach($parameters['checkboxCategories']);
        }
        return redirect()->route('formation-list');
    }

    public function update($id, FormationUpdateRequest $request)
    {
        $parameters = $request->validated();

        $formation = Formation::find($id);
        $formation->update($parameters);

        $formation->categories()->detach();
        $formation->types()->detach();
        if (!empty($parameters["checkboxCategories"])) {
            $formation->categories()->attach($parameters["checkboxCategories"]);
        }
        if (!empty($parameters["checkboxTypes"])) {
            $formation->types()->attach($parameters["checkboxTypes"]);
        }

        return back();
    }

    public function updateImage($id, UpdateImageRequest $request)
    {
        $parameters = $request->validated();
        $formation = Formation::find($id);

        if (Storage::exists("public/$formation->image"))
            Storage::delete("public/$formation->image");

        $file = Storage::put('public', $parameters['image']);
        $parameters['image'] = substr($file, 7);
        $formation->image = $parameters['image'];

        $formation->save();

        return back();
    }

    public function delete($id = null)
    {
        $formation = Formation::find($id);
        $formation->delete();
        return back();
    }
}
