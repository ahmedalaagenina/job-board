<x-layout :title="$title">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Contact Us</h1>
        <p class="text-lg mb-6">If you have any questions or feedback, please fill out the form below and we will get
            back to you as soon as possible.</p>

        <form action="#" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 p-2 rounded-lg"
                    required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 p-2 rounded-lg"
                    required>
            </div>

            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                <textarea id="message" name="message" rows="5" class="w-full border border-gray-300 p-2 rounded-lg" required></textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Send
                Message</button>
        </form>
    </div>

</x-layout>
