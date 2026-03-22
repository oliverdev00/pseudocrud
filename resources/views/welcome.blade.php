<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tasker | Manage with Precision</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="icon" type="image/png" href="{{ asset('images/rilakkuma_logo.png') }}">
    </head>
    <body class="antialiased font-sans text-gray-200">
        <!-- Aurora Background -->
        <div class="aurora-container">
            <div class="aurora-blob aurora-1"></div>
            <div class="aurora-blob aurora-2"></div>
            <div class="aurora-blob aurora-3"></div>
        </div>

        <div class="relative min-h-screen flex flex-col items-center justify-center p-6 lg:p-12 z-10">
            <div class="w-full max-w-7xl mx-auto flex flex-col items-center">
                
                <!-- Navbar -->
                <header class="w-full flex justify-between items-center mb-24 glass py-4 px-8 rounded-2xl border border-white/10">
                    <div class="flex items-center gap-3">
                        <x-application-logo class="h-10 w-auto text-indigo-400 drop-shadow-[0_0_10px_rgba(129,140,248,0.5)]" />
                        <span class="text-xl font-black tracking-tighter text-white uppercase italic">Tasker</span>
                    </div>

                    @if (Route::has('login'))
                        <div class="flex items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-6 py-2 glass hover:bg-white/10 rounded-xl font-bold text-sm transition-all border border-white/5">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="px-6 py-2 text-sm font-bold text-gray-400 hover:text-white transition-colors">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-6 py-2 bg-gradient-to-r from-indigo-600 to-fuchsia-600 rounded-xl font-bold text-sm text-white shadow-[0_0_20px_rgba(99,102,241,0.3)] hover:scale-105 transition-all">Get Started</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </header>

                <!-- Hero Section -->
                <main class="text-center max-w-4xl mx-auto">
                    <h1 class="text-6xl lg:text-8xl font-black text-white tracking-tight leading-[0.9] mb-8">
                        Master your projects with <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-fuchsia-400 to-sky-400">Tasker precision.</span>
                    </h1>
                    
                    <p class="text-xl text-indigo-100/60 font-medium mb-12 max-w-2xl mx-auto">
                        A premium, open-source task management ecosystem built with Laravel & Livewire. Designed for developers who value speed and aesthetics.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-6 mb-24">
                        <a href="{{ route('register') }}" class="group relative px-8 py-4 bg-white text-slate-900 rounded-2xl font-black text-lg transition-all hover:scale-105 active:scale-95 shadow-2xl">
                            Start Building Now
                            <div class="absolute inset-0 bg-indigo-400 blur-2xl opacity-0 group-hover:opacity-20 transition-opacity"></div>
                        </a>
                        <a href="https://github.com/oliverdev00/pseudocrud" target="_blank" class="px-8 py-4 glass border border-white/10 rounded-2xl font-bold text-lg text-white hover:bg-white/10 transition-all">
                            View Source Code
                        </a>
                    </div>

                    <!-- Feature Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="glass p-8 rounded-3xl border border-white/5 text-left">
                            <div class="size-12 bg-indigo-500/20 rounded-xl flex items-center justify-center mb-6 border border-indigo-500/30">
                                <svg class="size-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Ultra Reactive</h3>
                            <p class="text-sm text-indigo-100/40">Powered by Livewire 3 for a smooth, single-page app experience without the JS complexity.</p>
                        </div>
                        <div class="glass p-8 rounded-3xl border border-white/5 text-left text-indigo-100/40">
                            <div class="size-12 bg-fuchsia-500/20 rounded-xl flex items-center justify-center mb-6 border border-fuchsia-500/30">
                                <svg class="size-6 text-fuchsia-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Secure by Design</h3>
                            <p class="text-sm">Enterprise-ready authorization policies ensuring your data stays yours, always.</p>
                        </div>
                        <div class="glass p-8 rounded-3xl border border-white/5 text-left">
                            <div class="size-12 bg-sky-500/20 rounded-xl flex items-center justify-center mb-6 border border-sky-500/30">
                                <svg class="size-6 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Modern Aesthetic</h3>
                            <p class="text-sm text-indigo-100/40">Tailwind CSS powered premium design with glassmorphism and animated backgrounds.</p>
                        </div>
                    </div>
                </main>

                <footer class="mt-32 pb-16 text-indigo-400/20 font-bold tracking-widest text-xs uppercase">
                    Built with Passion by OliDev &bull; Laravel v{{ Illuminate\Foundation\Application::VERSION }}
                </footer>
            </div>
        </div>
    </body>
</html>
