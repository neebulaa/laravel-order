<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show_login()
    {
        return view('login', [
            "title" => "Login Page"
        ]);
    }

    public function login(Request $request)
    {
        $creds = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (!Auth::attempt($creds)) {
            return back()->with('login_failed', 'Wrong email or password!');
        }

        return redirect()->intended('/')->with('login_success', 'Welcome back user!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function show_register()
    {
        return view('register', [
            "title" => "Registration Page"
        ]);
    }

    public function register(Request $request)
    {
        $vd = $request->validate([
            "name" => "required|string|min:2",
            "email" => "required|email|unique:buyers,email",
            "password" => "required|min:5|regex:/^[a-z0-9._]+$/i"
        ], [
            "password.regex" => "Password can only contains alphanumeric, dots (.) and, underscores (_)"
        ]);


        Buyer::create($vd);

        $creds = [
            'password' => $vd['password'],
            'email' => $vd['email'],
        ];

        if (Auth::attempt($creds)) {
            return redirect()->intended('/')->with('login_success', 'Welcome user!');
        }
    }
}
