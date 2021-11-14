<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(9);
        return view('admin.user', compact('users'));
    }
}
