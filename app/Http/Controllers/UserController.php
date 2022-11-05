<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        dd($request->all());    
    }

    public function index()
    {
        $users = User::orderby('id', 'DESC')->paginate(4);
        return view('user.index', compact('users'));    
    }    
}
