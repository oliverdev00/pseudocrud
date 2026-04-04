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

        <!-- Theme Script -->
        <script>
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
    </head>
    <body class="antialiased font-sans bg-[#0a0a0a] text-gray-400 dark:bg-[#020617] dark:text-gray-500 transition-colors duration-300">
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

        <div class="relative min-h-screen flex flex-col items-center justify-center p-6 lg:p-12 z-10">
            <div class="w-full max-w-7xl mx-auto flex flex-col items-center">
                
                <!-- Navbar -->
                <header class="w-full flex justify-between items-center mb-24 glass py-4 px-8 rounded-2xl border border-white/5">
                    <div class="flex items-center gap-3">
                        <x-application-logo class="h-10 w-auto text-red-600 drop-shadow-[0_0_15px_rgba(220,38,38,0.4)]" />
                        <span class="text-xl font-black tracking-tighter text-gray-100 uppercase italic">Tasker</span>
                    </div>

                    @if (Route::has('login'))
                        <div class="flex items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-6 py-2 glass hover:bg-white/10 rounded-xl font-bold text-sm transition-all border border-white/5 text-gray-100">Access Terminal</a>
                            @else
                                <a href="{{ route('login') }}" class="px-6 py-2 text-sm font-bold text-gray-500 hover:text-white transition-colors">IDENTIFY</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-6 py-2 bg-gradient-to-r from-red-700 to-orange-800 border border-red-500/20 rounded-xl font-black text-sm text-white shadow-[0_0_20px_rgba(220,38,38,0.2)] hover:scale-110 transition-all uppercase tracking-widest">Enroll</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </header>

                <!-- Hero Section -->
                <main class="text-center max-w-4xl mx-auto">
                    <h1 class="text-6xl lg:text-8xl font-black text-gray-100 tracking-tighter leading-[0.9] mb-8 uppercase">
                        Archive with <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-orange-600 to-red-900">Absolute Precision.</span>
                    </h1>
                    
                    <p class="text-xl text-red-100/30 font-bold uppercase tracking-[0.2em] mb-12 max-w-2xl mx-auto">
                        A dystopian task orchestration ecosystem. Built for those who thrive in the dark.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-6 mb-24">
                        <a href="{{ route('register') }}" class="group relative px-8 py-4 bg-red-700 text-white rounded-2xl font-black text-lg transition-all hover:scale-105 active:scale-95 shadow-2xl border border-red-500/30 uppercase tracking-widest">
                            Initialize Protocol
                            <div class="absolute inset-0 bg-red-400 blur-2xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                        </a>
                        <a href="https://github.com/oliverdev00/pseudocrud" target="_blank" class="px-8 py-4 glass border border-white/5 rounded-2xl font-bold text-lg text-gray-300 hover:bg-white/10 transition-all">
                            Source Override
                        </a>
                    </div>

                    <!-- Feature Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center desaturate">
                        <div class="glass p-8 rounded-3xl border border-white/5">
                            <div class="size-12 bg-red-500/10 rounded-xl flex items-center justify-center mb-6 border border-red-500/20 mx-auto">
                                <svg class="size-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <h3 class="text-xl font-black text-gray-100 mb-2 uppercase tracking-tighter">Magma Flow</h3>
                            <p class="text-xs uppercase tracking-widest text-red-200/20 font-bold">Ultra-reactive orchestration powered by Livewire.</p>
                        </div>
                        <div class="glass p-8 rounded-3xl border border-white/5">
                            <div class="size-12 bg-orange-500/10 rounded-xl flex items-center justify-center mb-6 border border-orange-500/20 mx-auto">
                                <svg class="size-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <h3 class="text-xl font-black text-gray-100 mb-2 uppercase tracking-tighter">Blackbox Security</h3>
                            <p class="text-xs uppercase tracking-widest text-orange-200/20 font-bold">Encrypted authorization policies for discrete operations.</p>
                        </div>
                        <div class="glass p-8 rounded-3xl border border-white/5">
                            <div class="size-12 bg-gray-500/10 rounded-xl flex items-center justify-center mb-6 border border-gray-500/20 mx-auto">
                                <svg class="size-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                            </div>
                            <h3 class="text-xl font-black text-gray-100 mb-2 uppercase tracking-tighter">Dystopian Aura</h3>
                            <p class="text-xs uppercase tracking-widest text-gray-500/40 font-bold">Sober glassmorphism tailored for the modern void.</p>
                        </div>
                    </div>
                </main>

                <footer class="mt-32 pb-16 text-white/5 font-black tracking-[0.5em] text-[10px] uppercase text-center">
                    Systemic Protocol by <span class="text-red-900">OliDev</span> &bull; Terminal v{{ Illuminate\Foundation\Application::VERSION }}
                </footer>
            </div>
        </div>
    </body>
</html>
