<!DOCTYPE html>
<html>
    <p>{{ $user->name }}</p>
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
