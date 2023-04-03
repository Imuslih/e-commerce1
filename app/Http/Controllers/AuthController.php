<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        return view('register');
    }

    public function login(Request $request) {
        return view('login');
    }

    public function doRegister(Request $request) {
        //validasi request
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:100', 'email', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::default()]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function doLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required','string', 'max:100', 'email'],
            'password' => ['required', Rules\Password::defaults()]
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email and password invalid.'
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
