<!DOCTYPE html>
<html>
<div>
    <p><strong>{{ $post->author->name }}:</strong> {{ $post->body }}</p>

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
