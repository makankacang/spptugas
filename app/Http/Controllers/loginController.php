<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    public function login(){
        return view('auth/login');
    }
    public function loginuser(Request $request)
{
    if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
        return redirect('/home');
    }
    
    return redirect('/login')->with('error', 'Invalid credentials');
}

    public function register(){
        return view('auth/register');
    }
    public function logout(){
       Auth::logout();
       return redirect('/login');
    }
    public function registeruser(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),

        ]);
        return redirect()->route('login')->with('success','Data berhasil di Tambah');
    }
}
