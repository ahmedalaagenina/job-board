<x-layout :title="$post->title">
    <x-slot name="title">{{ $post->title }}</x-slot>

    <h2 class="text-xl font-semibold mb-2">Comments</h2>

    @if ($comments->isEmpty())
        <p>No comments available for this post.</p>
    @else
        <ul class="space-y-4">
            @foreach ($comments as $comment)
                <li class="border p-4 rounded shadow">
                    <p><strong>Author:</strong> {{ $comment->author }}</p>
                    <p><strong>Content:</strong> {{ $comment->content }}</p>
                    <p><strong>Created At:</strong> {{ $comment->created_at->format('Y-m-d H:i') }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</x-layout>
