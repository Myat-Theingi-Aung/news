<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\News;

class UserController extends Controller
{
    public function show(User $user)
    {
        $newsArticles = News::where('user_id', $user->id)->get();

        return view('user.show', compact('user', 'newsArticles'));
    }

    public function edit(User $user)
    {
        if (auth()->user()->id !== $user->id) {
            abort(404);
        }

        return view('user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        $user->save();

        return redirect()->route('user.show', $user)->with('success', 'User Update Successfully!');
    }
}
