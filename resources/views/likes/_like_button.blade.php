@if(Auth::check() && Auth::user()->isLiked($post))
    <form action="{{ route('posts.unlike', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Unlike</button>
    </form>
@else
    <form action="{{ route('posts.like', $post) }}" method="POST">
        @csrf
        <button type="submit">Like</button>
    </form>
@endif
