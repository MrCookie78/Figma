<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index(){
        $formations = Formation::orderBy('id', 'DESC')->paginate(9);
        return view('formations.list', compact('formations'));
    }

    public function detail($id = null)
    {
        // $posts = Post::where('id', $id)->get();
        if ($id)
            $formation = Formation::find($id);
        else
            $formation = array();

        $categories = Categorie::all();
        return view('formations.detail', compact(['formation', 'categories']));
    }
}
