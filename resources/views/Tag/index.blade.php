<x-layout :title="$title">


    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Tags</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($tags as $tag)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $tag->title }}</h2>
                    <p class="text-gray-600">Posts: {{ $tag->posts->count() }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
