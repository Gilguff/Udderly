<head>
    <title>Edit Profile</title>
    @include('layouts.app')
</head>

<h1>Edit Profile</h1>

<form action="{{ route('profiles.update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Bio:</label>
        <textarea name="bio" id="bio">{{ old('bio', $user->profile->bio) }}</textarea>

        <labed>Profile Picture Url:</label>
        <textarea name="profile_picture">{{ old('profile_picture', $user->profile->profile_picutre) }}</textarea>
    </div>


    <button type="submit">Update Profile</buton>
</form>
