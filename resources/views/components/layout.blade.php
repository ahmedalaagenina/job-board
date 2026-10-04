@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ? trim($title) . ' | ' : '' }}{{ config('app.name') }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav
        class="flex items-center border mx-4 max-md:w-full max-md:justify-between border-slate-200 px-6 py-4 rounded-full text-slate-800 text-sm">
        <a href="/">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="4.706" cy="16" r="4.706" fill="#1E293B" />
                <circle cx="16.001" cy="4.706" r="4.706" fill="#1E293B" />
                <circle cx="16.001" cy="27.294" r="4.706" fill="#1E293B" />
                <circle cx="27.294" cy="16" r="4.706" fill="#1E293B" />
            </svg>
        </a>
        <div class="hidden md:flex items-center gap-6 ml-7">
            <a href="/" class="relative overflow-hidden h-6 group">
                <span class="block group-hover:-translate-y-full transition-transform duration-300">Home</span>
                <span
                    class="block absolute top-full left-0 group-hover:translate-y-[-100%] transition-transform duration-300">Home</span>
            </a>
            <a href="/about" class="relative overflow-hidden h-6 group">
                <span class="block group-hover:-translate-y-full transition-transform duration-300">About</span>
                <span
                    class="block absolute top-full left-0 group-hover:translate-y-[-100%] transition-transform duration-300">About</span>
            </a>
            <a href="/contact" class="relative overflow-hidden h-6 group">
                <span class="block group-hover:-translate-y-full transition-transform duration-300">Contact</span>
                <span
                    class="block absolute top-full left-0 group-hover:translate-y-[-100%] transition-transform duration-300">Contact</span>
            </a>
        </div>

        <button id="menuToggle" class="md:hidden text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <div id="mobileMenu"
            class="absolute hidden top-48 text-base left-0 bg-white shadow-lg w-full flex-col items-center gap-4">
            <a class="hover:text-indigo-600" href="/">
                Home
            </a>
            <a class="hover:text-indigo-600" href="/about">
                About
            </a>
            <a class="hover:text-indigo-600" href="/contact">
                Contact
            </a>


        </div>
    </nav>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        menuToggle.addEventListener('click', () => {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('flex');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
            }
        });
    </script>


    {{ $slot }}
</body>

</html>
