<x-layout>
    <x-slot name="title">{{ $tag->name }}</x-slot>

    <h1 class="text-3xl font-bold mb-4">{{ $tag->name }}</h1>

    @if ($tag->posts->isEmpty())
        <p>No posts found for this tag.</p>
    @else
        <ul>
            @foreach ($tag->posts as $post)
                <li>
                    <a href="{{ route('blog.show', $post->id) }}" class="text-blue-500 hover:underline">
                        {{ $post->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
