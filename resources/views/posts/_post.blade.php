<div class="post">
    <div class="post-header">
        <img src="{{ $post->author->profile->profilePictureUrl() }}" alt="Profile Picture" class="profile-picture">
        <strong><a href="{{ route('profiles.show', $post->author) }}">{{ $post->author->name }}</a></strong>
        <span class="post-meta">{{ $post->created_at->diffForHumans() }}</span>
    </div>

    <div class="post-content">
        <p>{{ $post->body }}</p>
    </div>

    <div class="post-actions">
        <p>Likes: {{ $post->likesCount() }}</p>

        @if (Auth::user()->id == $post->author->id)
            <a href="{{ route('posts.edit', $post) }}">Edit Post</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @else
            @include('likes._like_button', ['post' => $post])
        @endif
    </div>

    <div class="post-comments">
        <h3>Comments</h3>
        @forelse($post->comments as $comment)
            @include('comments._comment', ['comment' => $comment, 'post' => $post])
        @empty
            <p>No Mini Moos Yet</p>
        @endforelse

        <h3>Add a comment:</h3>
        @include('comments._form', ['post' => $post])
    </div>
</div>

<style>
    .post {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .post-header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .profile-picture {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .post-meta {
        font-size: 0.8em;
        color: #888;
        margin-left: auto;
    }

    .post-content {
        margin-bottom: 10px;
    }

    .post-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .post-comments {
        margin-top: 10px;
    }
</style>
