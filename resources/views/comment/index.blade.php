<x-layout :title="$title">
    <x-slot name="title">Comments</x-slot>

    <h1 class="text-2xl font-bold mb-4">Comments</h1>

    @if ($comments->isEmpty())
        <p>No comments available.</p>
    @else
        <ul class="space-y-4">
            @foreach ($comments as $comment)
                <li class="border p-4 rounded shadow">
                    <p><strong>Author:</strong> {{ $comment->author }}</p>
                    <p><strong>Content:</strong> {{ $comment->content }}</p>
                    <p><strong>Post ID:</strong> {{ $comment->post_id }}</p>
                    <p><strong>Created At:</strong> {{ $comment->created_at->format('Y-m-d H:i') }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</x-layout>
