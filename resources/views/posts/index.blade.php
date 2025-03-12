<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>

<h1>Posts</h1>

<a href="{{ route('posts.create') }}"> Create a Post </a>


@forelse($posts as $post)
    @include('posts._post', ['post' => $post])
@empty
    <p>No Mooing to be seen here</p>
@endforelse

</html>
