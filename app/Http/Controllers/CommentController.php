<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string|max:255'
        ]);

        $comment_data = [
            'body' => $request->body,
            'author_id' => Auth::id(),
            'post_id' => $post->id
        ];
        $post->comments()->create($comment_data);

        return to_route('posts.index', $post);
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return to_route('posts.index');
    }
}
