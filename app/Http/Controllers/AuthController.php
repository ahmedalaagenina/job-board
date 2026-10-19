<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showSignupForm(Request $request)
    {
        return view('auth.signup');
    }

    public function signup(SignupRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);
        Auth::login($user);
        return redirect('/')->with('success', 'login success');
    }

    public function showLoginForm(Request $request)
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login Success');
        }
        return back()->with('error', 'the Provided credentials not correct');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'logout success');
    }
}
