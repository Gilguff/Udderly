<!DOCTYPE html>
<html>
<head>
    <title>Edit Your Moo</title>
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

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
        }

        button, .cancel-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .cancel-button {
            background-color: #f44336;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>Edit Your Moo</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="body">Your Moo:</label>
            <textarea id="body" name="body" rows="4">{{ $post->body }}</textarea>
        </div>

        <button type="submit">Update Moo</button>
        <a href="{{ route('posts.index') }}" class="cancel-button">Cancel</a>
    </form>
</body>
</html>
