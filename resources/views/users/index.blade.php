<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>

<h1>Users</h1>

<div>
    @foreach($users as $user)
        @include('users._user', ['user' => $user])
    @endforeach
</div>

</html>
