@props(['title' => null])

@php
    $links = [
        ['label' => 'Home', 'href' => '/', 'pattern' => '/'],
        ['label' => 'Jobs', 'href' => '/job', 'pattern' => 'job*'],
        ['label' => 'Blog', 'href' => '/blog', 'pattern' => 'blog*'],
        ['label' => 'About', 'href' => '/about', 'pattern' => 'about'],
        ['label' => 'Contact', 'href' => '/contact', 'pattern' => 'contact'],
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ? trim($title) . ' | ' : '' }}{{ config('app.name') }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-slate-50 text-slate-800 antialiased">
    <header class="sticky top-0 z-50 px-4 pt-4">
        <nav
            class="relative max-w-6xl mx-auto bg-white/80 backdrop-blur-md border border-slate-200/80 rounded-2xl shadow-sm">
            <div class="flex items-center justify-between gap-4 px-4 py-3">
                <a href="/" class="flex items-center gap-2.5 font-bold text-lg tracking-tight">
                    <span
                        class="grid place-items-center size-9 rounded-xl bg-indigo-600 shadow-sm shadow-indigo-600/30">
                        <svg class="size-5" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="4.706" cy="16" r="4.706" fill="#fff" />
                            <circle cx="16.001" cy="4.706" r="4.706" fill="#fff" />
                            <circle cx="16.001" cy="27.294" r="4.706" fill="#fff" />
                            <circle cx="27.294" cy="16" r="4.706" fill="#C7D2FE" />
                        </svg>
                    </span>
                    <span>{{ config('app.name') }}</span>
                </a>

                <div class="hidden md:flex items-center gap-1 p-1 rounded-full bg-slate-100/80 text-sm font-medium">
                    @foreach ($links as $link)
                        <a href="{{ $link['href'] }}" @class([
                            'px-4 py-1.5 rounded-full transition',
                            'bg-white text-indigo-600 shadow-sm' => request()->is($link['pattern']),
                            'text-slate-600 hover:text-slate-900' => !request()->is($link['pattern']),
                        ])>
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </div>
                @auth
                    <div class="flex: gap-1 flex items-center">
                        <span class="text-sm text-slate-600">
                            Welcome back, {{ Auth::user()->name }}
                        </span>
                        <a href="/blog/create"
                            class="hidden md:inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-slate-900 text-white text-sm font-medium hover:bg-indigo-600 transition">
                            <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5v14M5 12h14" />
                            </svg>
                            New Post
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button>
                                logout
                            </button>

                        </form>
                    </div>
                @else
                    <div class="flex: gap-1 flex items-center">
                        <a href="/login"
                            class="hidden md:inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-slate-900 text-white text-sm font-medium hover:bg-indigo-600 transition">
                            login
                        </a>
                        <a href="/signup"
                            class="hidden md:inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-slate-900 text-white text-sm font-medium hover:bg-indigo-600 transition">
                            signup
                        </a>
                    </div>
                @endauth



                <button id="menuToggle" type="button" aria-controls="mobileMenu" aria-expanded="false"
                    class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100">
                    <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <div id="mobileMenu" class="hidden md:hidden flex-col gap-1 border-t border-slate-200 p-2">
                @foreach ($links as $link)
                    <a href="{{ $link['href'] }}" @class([
                        'px-4 py-2.5 rounded-lg font-medium',
                        'bg-indigo-50 text-indigo-700' => request()->is($link['pattern']),
                        'text-slate-600 hover:bg-slate-100' => !request()->is($link['pattern']),
                    ])>
                        {{ $link['label'] }}
                    </a>
                @endforeach
                <a href="/blog/create"
                    class="mt-1 px-4 py-2.5 rounded-lg bg-slate-900 text-white font-medium text-center">
                    New Post
                </a>
            </div>
        </nav>
    </header>

    <main class="flex-1">
        {{ $slot }}
    </main>

    <footer class="border-t border-slate-200 bg-white">
        <div
            class="max-w-6xl mx-auto px-4 py-6 flex flex-col sm:flex-row items-center justify-between gap-2 text-sm text-slate-500">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="/about" class="hover:text-slate-900">About</a>
                <a href="/contact" class="hover:text-slate-900">Contact</a>
            </div>
        </div>
    </footer>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        menuToggle.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.toggle('flex');
            mobileMenu.classList.toggle('hidden', !isOpen);
            menuToggle.setAttribute('aria-expanded', isOpen);
        });
    </script>
</body>

</html>
