<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function auth_login(Request $request) {
       $remember = $request->has('remember') ? true : false;
       if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->intended('dashboard');
       } else {
            return redirect()->back()->with('error', 'Please check your email and password');
       }
    }
}
