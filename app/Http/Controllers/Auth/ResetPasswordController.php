<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function show($user, $token)
    {
        return view('auth.reset', compact('user', 'token'));
    }

    public function reset(ResetRequest $request, User $user)
    {
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('login')->with('success', 'Password reset successfully!');
    }
}
