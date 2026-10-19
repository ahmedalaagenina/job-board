<x-layout-simple>
    <x-slot name="title">Sign Up</x-slot>

    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto mb-6 text-center">
            <h2 class="text-2xl font-bold">Create Your Account</h2>
        </div>
        <div class="max-w-md mx-auto bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6">Sign Up</h2>

            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('signup') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-3 py-2 border rounded @error('name') border-red-500 @enderror">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full px-3 py-2 border rounded @error('email') border-red-500 @enderror">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-3 py-2 border rounded @error('password') border-red-500 @enderror">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full px-3 py-2 border rounded @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
                    Create Account
                </button>
            </form>

            <p class="mt-4 text-center text-gray-600">
                Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login
                    here</a>.
            </p>
        </div>
    </div>
</x-layout-simple>
