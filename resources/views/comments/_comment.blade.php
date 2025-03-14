<!DOCTYPE html>
<html>

<div class="comment">
    <p><strong>{{ $comment->author->name }}:</strong>  {{ $comment->body }}</p>
</div>
<div>
    @if (Auth::user() == $comment->author)
        <form action="{{ route('posts.comments.destroy', ['post' => $post->id, 'comment' => $comment->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
    @endif
</div>
</html>
