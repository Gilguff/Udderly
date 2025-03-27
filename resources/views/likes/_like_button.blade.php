@if(Auth::check() && Auth::user()->isLiked($post))
    <form action="{{ route('posts.unlike', $post) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="unlike-button">Unlike</button>
    </form>
@else
    <form action="{{ route('posts.like', $post) }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="like-button">Like</button>
    </form>
@endif

<style>
    .like-button, .unlike-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .unlike-button {
        background-color: #f44336;
    }
</style>
