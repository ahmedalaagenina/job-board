<x-layout :title="$title">
    <main class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-slate-800 mb-8">Blog</h1>

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
