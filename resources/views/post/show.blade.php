<x-layout :title="$post->title">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <p>Author: {{ $post->author }}</p>
    <p>Published: {{ $post->is_published ? 'Yes' : 'No' }}</p>

    <div class="flex items-center justify-end gap-2 my-4">
        <a href="{{ route('blog.edit', $post->id) }}"
            class="px-3 py-1 text-sm rounded bg-indigo-600 text-white hover:bg-indigo-700">Edit</a>

        <form action="{{ route('blog.destroy', $post->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete this post?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="px-3 py-1 text-sm rounded bg-red-600 text-white hover:bg-red-700">Delete</button>
        </form>
    </div>


    <form action={{ route('blog.comments.store', $post->id) }} method="POST" class="mt-8">
        @csrf
        <div>
            <label for="Add Comment" class="block text-sm font-medium text-slate-700 mb-1">Add Comment</label>
            <textarea id="content" name="content" rows="6" @class([
                'w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2',
                'border-red-500 focus:ring-red-500' => $errors->has('author'),
                'border-slate-300 focus:ring-indigo-500' => !$errors->has('author'),
            ])></textarea>
            @error('content')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="author" class="block text-sm font-medium text-slate-700 mb-1">Author</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}"
                @class([
                    'w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2',
                    'border-red-500 focus:ring-red-500' => $errors->has('author'),
                    'border-slate-300 focus:ring-indigo-500' => !$errors->has('author'),
                ])>
            @error('author')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition">
                Add Comment
            </button>
        </div>
    </form>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <h2 class="text-2xl font-bold mt-8 mb-4"> Comments</h2>
    @if ($post->comments->isEmpty())
        <p>No comments found for this post.</p>
    @else
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
    @endif
</x-layout>
