<!DOCTYPE html>
<html>
<div>
    <img src="{{ $post->author->profile->profilePictureUrl()}}" alt="Profile Picture" style="width: 40px; height: 40px;">
    <p><strong><a href="{{ route('profiles.show', $post->author) }}">{{ $post->author->name }}:</a></strong> {{ $post->body }}</p>
</div>

<div>
<p>Likes: {{ $post->likesCount() }}</p>

@if (Auth::user() == $post->author)
    <a href="{{ route('posts.edit', $post) }}">Edit Post</a>
    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button>
    </form>
@else
    @include('likes._like_button', ['post' => $post])
@endif
</div>

<div>
    <h3>Comments</h3>
    @forelse($post->comments as $comment)
        @include('comments._comment', ['comment' => $comment, 'post' => $post])
    @empty
        <p>No Mini Moos Yet</p>
    @endforelse

    <h3>Add a comment:</h3>
    @include('comments._form', ['post' => $post])
</div>

</html>
