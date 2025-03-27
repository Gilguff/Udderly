<!DOCTYPE html>
<html>
<head>
    <title>Our Cow Community</title>
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

        .user {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .profile-picture {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info {
            flex-grow: 1;
        }

        .user-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .user-bio {
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Meet Our Cow Community</h1>

    <div>
        @foreach($users as $user)
            @include('users._user', ['user' => $user])
        @endforeach
    </div>
</body>
</html>
