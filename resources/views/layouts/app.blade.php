<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script>
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="icon" type="image/png" href="{{ asset('images/rilakkuma_logo.png') }}">
    </head>
    <body class="font-sans antialiased bg-white text-gray-900 dark:bg-[#020617] dark:text-gray-200 selection:bg-indigo-500/30 transition-colors duration-300">
        <!-- Aurora Background -->
        <div class="aurora-container">
            <div class="aurora-blob aurora-1"></div>
            <div class="aurora-blob aurora-2"></div>
            <div class="aurora-blob aurora-3"></div>
        </div>

        <!-- Starfield -->
        <div class="stars-layer">
            <div class="stars-1"></div>
            <div class="stars-2"></div>
        </div>

        <div class="min-h-screen">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="glass sticky top-0 z-30 border-b border-white/10">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="relative z-10">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
