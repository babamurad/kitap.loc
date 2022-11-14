<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'Успешно зарегистрирован!');
        Auth::login($user);        
        return redirect()->action('App\Http\Controllers\MainController@index');  
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function index()
    {
        $users = User::orderby('id', 'DESC')->paginate(5);
        return view('user.index', compact('users'));    
    } 

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]) )
        {            
            if (Auth::user()->is_admin){
                return view('admin.index');   
            } 
            // dd('here');
            return redirect()->action('App\Http\Controllers\MainController@index');          
        } 

        return redirect()->back()->with('error', 'Неравильные логин или пароль.');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->action('App\Http\Controllers\MainController@index');
    }

    public function get_admin(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);
        if($request->is_admin){
            $user->is_admin = 1;    
        } else {
            $user->is_admin = 0;    
        }        
        $user->update();

        $users = User::orderby('id', 'DESC')->paginate(5);
        return view('user.index', compact('users')); 
    }
}
