<x-layout :title="$title">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Welcome to the Job Board</h1>
        <p class="text-lg mb-6">Find your dream job or post a job opening.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Example job listings -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Software Engineer</h2>
                <p class="text-gray-700 mb-4">Company A - New York, NY</p>
                <a href="#" class="text-blue-500 hover:underline">View Details</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Product Manager</h2>
                <p class="text-gray-700 mb-4">Company B - San Francisco, CA</p>
                <a href="#" class="text-blue-500 hover:underline">View Details</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">UX Designer</h2>
                <p class="text-gray-700 mb-4">Company C - Austin, TX</p>
                <a href="#" class="text-blue-500 hover:underline">View Details</a>
            </div>
        </div>
    </div>
</x-layout>
