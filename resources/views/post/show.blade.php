<x-layout :title="$post->title">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <p>Author: {{ $post->author }}</p>
    <p>Published: {{ $post->is_published ? 'Yes' : 'No' }}</p>
    @foreach ($post->comments as $comment)
        <ul class="space-y-4">
            <li class="border p-4 rounded shadow">
                <p><strong>Author:</strong> {{ $comment->author }}</p>
                <p><strong>Content:</strong> {{ $comment->body }}</p>
                <p><strong>Post ID:</strong> {{ $comment->post_id }}</p>
                <p><strong>Created At:</strong> {{ $comment->created_at->format('Y-m-d H:i') }}</p>
            </li>
        </ul>
    @endforeach
    <h2 class="text-2xl font-bold mt-8 mb-4"> Comments</h2>
    @if ($post->comments->isEmpty())
        <p>No comments found for this post.</p>
    @else
        <ul>
            @foreach ($post->comments as $comment)
                <li>
                    <p><strong>Author:</strong> {{ $comment->author }}</p>
                    <p><strong>Content:</strong> {{ $comment->body }}</p>
                    <p><strong>Created At:</strong> {{ $comment->created_at->format('Y-m-d H:i') }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</x-layout>
