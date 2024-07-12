<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $this->setRememberMeToken($user);
            return redirect()->intended('/');
        }

        return redirect()->back()->with('error', 'The provided credentials do not match our records.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    private function setRememberMeToken($user)
    {
        $rememberToken = Str::random(60);
        $user->setRememberToken($rememberToken);
        $user->save();

        Cookie::queue(Cookie::make('remember_me', $rememberToken, 525600)); // 525600 minutes = 1 year
    }
}
