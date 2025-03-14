<form action="{{ route('posts.comments.store', ['post' => $post->id]) }}" method="POST">
    @csrf
    <textarea name="body" placeholder="Moo" rows="1" cols="20"></textarea><br />
    <button type="Submit">Submit</button>
</form>
