<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function show(User $user)
    {
        $profile = $user->profile() ?? $user->profile()->create();
        $posts = $user->posts();

        return view('profiles.show', ['user' => $user, 'posts' => $posts, 'profile' => $profile]);
    }

    public function edit(User $user)
    {
        $profile = $user->profile() ?? $user->profile()->create();

        return view('profiles.edit', ['user' => $user, 'profile' => $profile]);
    }

    public function update(Request $request, User $user)
    {
        $profile = $user->profile();

        $request->validate([
            'bio' => 'string|nullable|max:500',
            'profile_picture' => 'string|nullable'
        ]);

        if ($profile->update($request->only(['bio', 'profile_picture']))) {
            return to_route('profiles.show', $user);
        } else {
            return back();
        }
    }
}
