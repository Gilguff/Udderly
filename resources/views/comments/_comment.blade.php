<!DOCTYPE html>
<html>

<div class="comment">
    <img src="{{ $comment->author->profile->profilePictureUrl()}}" alt="Profile Picture" style="width: 40px; height: 40px;">
    <p><strong><a href="{{ route('profiles.show', $comment->author) }}">{{ $comment->author->name }}:</a></strong>  {{ $comment->body }}</p>
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
