<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ForgotRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\User;
use DB;

class ForgotPasswordController extends Controller
{
    public function show()
    {
        return view('auth.forgot');
    }

    public function forgot(ForgotRequest $request)
    {
        $user = User::where('email', $request->input('email'))->first();;
        $token = Str::random(64);

        if ($user) {
            $token = Str::random(64);

            return redirect()->route('reset', ['token' => $token, 'user' => $user])->with('success', 'Reset password form send successfully!');
        }

        return redirect()->back()->with('error', 'The provided credentials do not match our records.');
    }
}
