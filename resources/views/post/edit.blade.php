<x-layout :title="$title">
    <div class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-slate-800 mb-8">Edit Post</h1>

        <form action="{{ route('blog.update', $post->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                    @class([
                        'w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2',
                        'border-red-500 focus:ring-red-500' => $errors->has('title'),
                        'border-slate-300 focus:ring-indigo-500' => !$errors->has('title'),
                    ])>
                @error('title')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-slate-700 mb-1">Body</label>
                <textarea id="body" name="body" rows="6" @class([
                    'w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2',
                    'border-red-500 focus:ring-red-500' => $errors->has('body'),
                    'border-slate-300 focus:ring-indigo-500' => !$errors->has('body'),
                ])>{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="author" class="block text-sm font-medium text-slate-700 mb-1">Author</label>
                <input type="text" id="author" name="author" value="{{ old('author', $post->author) }}"
                    @class([
                        'w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2',
                        'border-red-500 focus:ring-red-500' => $errors->has('author'),
                        'border-slate-300 focus:ring-indigo-500' => !$errors->has('author'),
                    ])>
                @error('author')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-2">
                <input type="hidden" name="is_published" value="0">
                <input type="checkbox" id="is_published" name="is_published" value="1" @checked(old('is_published', $post->is_published))
                    class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                <label for="is_published" class="text-sm text-slate-700">Publish now</label>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit"
                    class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition">
                    Update
                </button>
                <a href="/blog" class="text-slate-500 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
