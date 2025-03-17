<head>
    <title>{{ $user->name }}</title>
    @include('layouts.app')
</head>


<h1>{{ $user->name }}</h1>

<img src="{{ $user->profile->profilePictureUrl() }}" alt="Profile Picture">

<div>
    <p>Followers: {{ $user->followersCount() }}
    Following: {{ $user->followingCount() }}</p>

    <p>{{ $user->profile->bio ?? "No Yapping To Be Seen Here." }}</p>
</div>


<br />
@if (Auth::user()->id == $user->id)
    <a href="{{ route('profiles.edit', $user) }}">Edit Profile</a>
@endif

<br />
<h2>{{ $user->name }}'s Posts</h2>
@forelse ($user->posts as $post)
    @include('posts._post', ['post' => $post])
@empty
    <p>No Mooing Yet</p>
@endforelse



