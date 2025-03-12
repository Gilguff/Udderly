<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments.author')->get();

        return view('posts.index', ['posts' => $posts]);
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:255'
        ]);

        $user = Auth::user();

        if ($user) {
            $post = new Post();
            $post->body = $request->input('body');
            $post->author_id = $user->id;
            $post->save();
            return to_route('posts.index');
        } else {
            return to_route('login');
        }
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate(['body' => 'string|max:255']);

        $post->update($validated);

        return to_route('posts.index', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index');
    }
}
