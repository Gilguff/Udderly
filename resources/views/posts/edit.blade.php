<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="body">Post Body:</label><br>
        <textarea id="body" name="body" rows="4" cols="50">{{ $post->body }}</textarea><br><br>

        <button type="submit">Update Post</button>
    </form>
    <a href="{{ route('posts.index', $post) }}">Cancel</a>
</body>
</html>
