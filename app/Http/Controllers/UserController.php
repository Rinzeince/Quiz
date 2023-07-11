<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_proses(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $data = [
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ];

    if (Auth::attempt($data)) {
        return redirect('/product');
    } else {
        return redirect()->route('login')->with('failed', 'Email atau password salah');
    }
}


    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('Success', 'Kamu berhasil Logout');
    }

    public function register()
    {
        return view('register');
    }


    public function register_proses(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        
    ];

    User::create($data);

    $login = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        
    ];

    if (Auth::attempt($login)) {
        return redirect('/product');
    } else {
        return redirect()->route('login')->with('failed', 'Email atau password salah');
    }
}

}
