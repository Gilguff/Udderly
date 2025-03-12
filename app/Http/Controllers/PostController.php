<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

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

        $user = auth()->user();

        if ($user) {
            $post = new Post();
            $post->body = $request->input('body');
            $post->author_id = $user->id;
            $post->save();
            return redirect()->route('posts.index');
        } else {
            return to_route('login');
        }
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validated(['body' => 'string|max:255']);

        $post->update($validated);

        return to_route('posts.show', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index');
    }
}
