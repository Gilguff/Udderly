<form action="{{ route('posts.comments.store', ['post' => $post->id]) }}" method="POST">
    @csrf
    <textarea name="body" placeholder="Add your Mini Moo..." rows="2" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px; resize: vertical;"></textarea><br />
    <button type="submit" style="background-color: #4CAF50; color: white; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
</form>

<style>
    form {
        margin-top: 10px;
    }
</style>
