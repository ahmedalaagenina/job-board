<x-layout :title="$post->title">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Author ID: {{ $post->author_id }}</p>
    <p>Published: {{ $post->is_published ? 'Yes' : 'No' }}</p>
</x-layout>
