<head>
    <title>{{ $user->name }}'s Pasture</title>
    @include('layouts.app')
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .profile-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-info {
            flex-grow: 1;
        }

        .profile-stats {
            margin-bottom: 10px;
        }

        .profile-bio {
            font-style: italic;
            color: #666;
        }

        .edit-profile-link {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .posts-section {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>{{ $user->name }}'s Pasture</h1>

    <div class="profile-container">
        <img src="{{ $user->profile->profilePictureUrl() }}" alt="Profile Picture" class="profile-picture">
        <div class="profile-info">
            <div class="profile-stats">
                <strong>Followers:</strong> {{ $user->followersCount() }} | <strong>Following:</strong> {{ $user->followingCount() }}
            </div>
            <p class="profile-bio">{{ $user->profile->bio ?? "No Yapping To Be Seen Here." }}</p>
            @if (Auth::user()->id == $user->id)
                <a href="{{ route('profiles.edit', $user) }}" class="edit-profile-link">Edit Profile</a>
            @endif
        </div>
    </div>

    <div class="posts-section">
        <h2>{{ $user->name }}'s Moos</h2>
        @forelse ($user->posts as $post)
            @include('posts._post', ['post' => $post])
        @empty
            <p>No Mooing Yet</p>
        @endforelse
    </div>
</body>
</html>


