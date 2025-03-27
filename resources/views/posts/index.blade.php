<!DOCTYPE html>
<html>
<head>
    <title>Moo Feed</title>
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

        .post {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .post-content {
            margin-bottom: 10px;
        }

        .post-meta {
            font-size: 0.8em;
            color: #888;
        }

        .no-posts {
            text-align: center;
            font-style: italic;
            color: #aaa;
            padding: 20px;
        }

        .create-post-link {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .profile-picture {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
        }

        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Moo Feed</h1>

    <a href="{{ route('posts.create') }}" class="create-post-link">Create a New Moo</a>

    @forelse($posts as $post)
        @include('posts._post', ['post' => $post])
    @empty
        <p>No Mooing to be seen here</p>
    @endforelse
</body>
</html>
