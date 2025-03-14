<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        $followers = $user->followers;
        $following = $user->following;
    }

    public function follow(User $user)
    {
        Auth::user()->follow($user);
        return back();
    }

    public function unfollow(User $user)
    {
        Auth::user()->unfollow($user);
        return back();
    }
}
