<form action="{{ route('posts.comments.store', ['post' => $post->id]) }}" method="POST">
    @csrf
    <textarea name="body" placeholder="Moo"></textarea><br />
    <button type="Submit">Submit</button>
</form>
