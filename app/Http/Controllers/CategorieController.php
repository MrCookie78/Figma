<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieStoreRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categorie.list', compact('categories'));
    }

    public function add()
    {
        return view('categorie.add');
    }

    public function store(CategorieStoreRequest $request)
    {
        $params = $request->validated();
        Categorie::create($params);
        return redirect()->route("categories-list");
    }

    public function update(CategorieStoreRequest $request, $id)
    {
        $params = $request->validated();
        $categorie = Categorie::find($id);
        $categorie->update($params);
        return back();
    }

    public function delete($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return back();
    }
}
