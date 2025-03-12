<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>

<h1>Posts</h1>

<a href="{{ route('posts.create') }}"> Create a Post </a>

@if (count($posts) > 0)
    @each('posts._post', $posts, 'post')
@else
    <p>No Mooing to be seen here</p>
@endif

</html>
