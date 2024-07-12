<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function show(User $user)
    {
        return view('auth.changePassword', compact('user'));
    }

    public function update(ChangePasswordRequest $request, User $user)
    {
        if (!Hash::check($request->input('current_password'), $user->password)) {

            return redirect()->back()->with('error', 'The provided credentials do not match our records.');
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('user.show', $user)->with('success', 'Password Update Successfully!');
    }
}
