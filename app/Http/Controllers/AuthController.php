<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)){
            return redirect('dashboard');
        }
        return redirect('login')->with('error', 'Emal dan Password salah!');
    }
    public function logout()
    {
        try {
            Auth::logout();
            return redirect('login');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', $th->getMessage());
        }
    }
}
