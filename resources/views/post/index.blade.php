
<x-layout :title="$title">
    <h1>Blog</h1>

    @foreach ($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p>Author ID: {{ $post->author_id }}</p>
            <p>Published: {{ $post->is_published ? 'Yes' : 'No' }}</p>
        </div>
    @endforeach
</x-layout>
