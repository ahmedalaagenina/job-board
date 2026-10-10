<x-layout :title="$title">
    <h1>Blog</h1>

    @foreach ($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p>Author ID: {{ $post->author_id }}</p>
            <p>Published: {{ $post->is_published ? 'Yes' : 'No' }}</p>
            <a href="/blog/{{ $post->id }}/comments" class="text-blue-500 hover:underline">View Comments</a>
        </div>
    @endforeach
</x-layout>
