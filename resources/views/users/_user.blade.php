<!DOCTYPE html>
<html>
    <img src="{{ $user->profile->profilePictureUrl()}}" alt="Profile Picture" style="width: 40px; height: 40px;">
    <a href="{{ route('profiles.show', $user) }}">{{ $user->name }}</a>
    @if (Auth::check() && Auth::user() != $user)
        @if (Auth::user()->isFollowing($user))
            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Unfollow</button>
            </form>
        @else
            <form action="{{ route('users.follow', $user) }}" method="POST">
                @csrf
                <button type="submit">Follow</button>
            </form>
        @endif
    @endif
</html>
