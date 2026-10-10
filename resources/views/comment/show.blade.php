<x-layout>
    <x-slot name="title">Comments</x-slot>

    <h1 class="text-2xl font-bold mb-4">Comments</h1>

    <ul class="space-y-4">
        <li class="border p-4 rounded shadow">
            <p><strong>Author:</strong> {{ $comment->author }}</p>
            <p><strong>Content:</strong> {{ $comment->content }}</p>
            <p><strong>Post ID:</strong> {{ $comment->post_id }}</p>
            <p><strong>Created At:</strong> {{ $comment->created_at->format('Y-m-d H:i') }}</p>
            <a href="/blog/{{ $comment->post_id }}" class="text-blue-500 hover:underline">View Post</a>
        </li>
    </ul>
</x-layout>
