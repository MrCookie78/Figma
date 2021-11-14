<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeStoreRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('type.list', compact('types'));
    }

    public function add()
    {
        return view('type.add');
    }

    public function store(TypeStoreRequest $request)
    {
        $params = $request->validated();
        Type::create($params);
        return redirect()->route("types-list");
    }

    public function update(TypeStoreRequest $request, $id)
    {
        $params = $request->validated();
        $type = Type::find($id);
        $type->update($params);
        return back();
    }

    public function delete($id)
    {
        $type = Type::find($id);
        $type->delete();
        return back();
    }
}
