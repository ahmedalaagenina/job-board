<x-layout :title="$title">
    <main class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-slate-800 mb-8">Blog</h1>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <div class="space-y-4">
            @forelse ($posts as $post)
                <article class="border border-slate-200 rounded-xl p-5 hover:shadow-md transition">
                    <div class="flex items-start justify-between gap-4">
                        <h2 class="text-lg font-semibold text-slate-800">
                            <a href="/blog/{{ $post->id }}" class="hover:text-indigo-600">{{ $post->title }}</a>
                        </h2>
                        <span @class([
                            'text-xs px-2 py-1 rounded-full shrink-0',
                            'bg-green-100 text-green-700' => $post->is_published,
                            'bg-slate-100 text-slate-500' => !$post->is_published,
                        ])>
                            {{ $post->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </div>

                    <p class="text-slate-600 mt-2">{{ $post->body }}</p>

                    <div class="flex items-center justify-between mt-4 text-sm">
                        <span class="text-slate-500">By {{ $post->author }}</span>
                        <a href="/blog/{{ $post->id }}" class="text-indigo-600 hover:underline">View Comments</a>
                    </div>

                    <div class="flex items-center justify-end gap-2 mt-4">
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
                </article>
            @empty
                <p class="text-slate-500">No posts yet.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </main>
</x-layout>
