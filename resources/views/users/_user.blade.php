<div class="user">
    <img src="{{ $user->profile->profilePictureUrl() }}" alt="Profile Picture" class="profile-picture">
    <div class="user-info">
        <div class="user-name">
            <a href="{{ route('profiles.show', $user) }}">{{ $user->name }}</a>
        </div>
    </div>
    <div class="user-actions">
        @if (Auth::check() && Auth::user() != $user)
            @if (Auth::user()->isFollowing($user))
                <form action="{{ route('users.unfollow', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="unfollow-button">Unfollow</button>
                </form>
            @else
                <form action="{{ route('users.follow', $user) }}" method="POST">
                    @csrf
                    <button type="submit" class="follow-button">Follow</button>
                </form>
            @endif
        @endif
    </div>
</div>

<style>
    .user {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .profile-picture {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-info {
        flex-grow: 1;
    }

    .user-name {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .user-actions {
        margin-left: auto;
    }

    .follow-button, .unfollow-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .unfollow-button {
        background-color: #f44336;
    }
</style>
