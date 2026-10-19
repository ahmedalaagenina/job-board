<x-layout-simple>
    <x-slot name="title">Login</x-slot>

    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6">Login</h2>

            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
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

                <div class="mb-4 flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-gray-700">Remember Me</label>
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
                    Login
                </button>
            </form>

            <p class="mt-4 text-center text-gray-600">
                Don't have an account? <a href="{{ route('signup') }}" class="text-blue-500 hover:underline">Sign up
                    here</a>.
            </p>
        </div>
    </div>
</x-layout-simple>
