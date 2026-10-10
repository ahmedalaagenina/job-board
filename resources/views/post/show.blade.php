<x-layout :title="$post->title">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Author ID: {{ $post->author_id }}</p>
    <p>Published: {{ $post->is_published ? 'Yes' : 'No' }}</p>
    @foreach ($post->comments as $comment)
        <ul class="space-y-4">
            <li class="border p-4 rounded shadow">
                <p><strong>Author:</strong> {{ $comment->author }}</p>
                <p><strong>Content:</strong> {{ $comment->content }}</p>
                <p><strong>Post ID:</strong> {{ $comment->post_id }}</p>
                <p><strong>Created At:</strong> {{ $comment->created_at->format('Y-m-d H:i') }}</p>
            </li>
        </ul>
    @endforeach
    <a href="/blog/{{ $post->id }}/comments" class="text-blue-500 hover:underline">View All Comments</a>
</x-layout>
