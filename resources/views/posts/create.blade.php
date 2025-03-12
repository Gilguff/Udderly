<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    <h1>Create a New Post</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <label for="body">Post Body:</label><br>
        <textarea id="body" name="body" rows="4" cols="50">{{ old('body') }}</textarea><br><br>

        <button type="submit">Create Post</button>
    </form>
    <a href="{{ route('posts.index') }}">Cancel</a>
</body>
</html>
