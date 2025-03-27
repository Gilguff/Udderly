<div class="comment">
    <div class="comment-header">
        <img src="{{ $comment->author->profile->profilePictureUrl() }}" alt="Profile Picture" class="profile-picture">
        <strong><a href="{{ route('profiles.show', $comment->author) }}">{{ $comment->author->name }}</a></strong>
        <span class="comment-meta">{{ $comment->created_at->diffForHumans() }}</span>
    </div>

    <div class="comment-content">
        <p>{{ $comment->body }}</p>
    </div>

    @if (Auth::user()->id == $comment->author->id)
        <form action="{{ route('posts.comments.destroy', ['post' => $post->id, 'comment' => $comment->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endif
</div>

<style>
    .comment {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 5px;
        border-radius: 5px;
    }

    .comment-header {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
    }

    .profile-picture {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 5px;
    }

    .comment-meta {
        font-size: 0.8em;
        color: #888;
        margin-left: auto;
    }

    .comment-content {
        margin-bottom: 5px;
    }
</style>
