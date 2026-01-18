<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {   
        if(Auth::attempt($request->only('username', 'password'))){
            return redirect('/dashboard');
        } else {
            return redirect('/')->with('error', 'Maaf Username dan Password Salah');
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}

