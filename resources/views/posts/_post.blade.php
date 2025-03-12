<!DOCTYPE html>
<html>

<div class="post-header">
    <h2>{{ $post->author->name }}</h2>
</div>

<div class="post-body">
    <p>{{ $post->body }}</p>
</div>

@if (Auth::user() == $post->author)
    <a href="{{ route('posts.edit', $post) }}">Edit Post</a>
    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button>
    </form>
@endif


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
