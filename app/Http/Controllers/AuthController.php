<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login() {
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'john@gmail.com',
        //     'password' => bcrypt('0000')
        // ]);

        return view("auth.login");
    }

    public function signin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4'],
        ]);

        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'You are now logged in');
        }

        return back()->withInput()->withErrors([
            'email' => 'Identifiants invalides',
        ])->onlyInput('email');
    }

    public function register() {
        return view("auth.register");
    }

    public function signup(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4'],
        ]);

        $user = User::create($credentials);

        auth()->login($user);

        return redirect()->route('admin.dashboard')->with('success', 'Your account has been created');
    }
    public function logout(): RedirectResponse
    {
        auth()->logout();
        return to_route('home')->with('success', 'You have been logged out');
    }
}
