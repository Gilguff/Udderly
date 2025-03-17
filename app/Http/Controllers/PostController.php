<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function followingPosts()
    {
        $user = Auth::user();
        $following = $user->following->pluck('id');

        $posts = Post::whereIn('author_id', $following)->orWhere('author_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('posts.following', ['posts' => $posts]);
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

        $user->posts()->create([
            'body' => $request->body,
            'author_id' => $user->id,
        ]);

        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'body' => 'string|max:255'
        ]);

        $post->update($validated);

        return to_route('posts.index', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index');
    }
}
