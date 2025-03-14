<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikingController extends Controller
{
    //

    public function store(Post $post)
    {
        $user = Auth::user();
        if ($user->isLiked($post)) {
            return back();
        }

        $user->like($post);

        return back();
    }

    public function destroy(Post $post)
    {
        $user = Auth::user();
        if (!$user->isLiked($post)) {
            return back();
        }

        $user->unlike($post);

        return back();
    }
}
