<x-app-layout>
    <div class="py-12 relative min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-dark overflow-hidden shadow-2xl sm:rounded-3xl p-12 border border-gray-200 dark:border-white/10">
                <div class="flex flex-col items-center text-center space-y-8">
                    <div class="p-6 rounded-full bg-indigo-500/10 border border-indigo-500/20 shadow-[0_0_50px_rgba(99,102,241,0.2)] animate-pulse">
                        <svg class="h-16 w-16 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    
                    <div>
                        <h1 class="text-5xl font-black text-gray-900 dark:text-white tracking-tighter mb-4">
                            Welcome, <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-fuchsia-600 dark:from-indigo-400 dark:to-fuchsia-400">{{ Auth::user()->name }}</span>
                        </h1>
                        <p class="text-gray-600 dark:text-indigo-200/60 text-xl font-medium max-w-2xl mx-auto leading-relaxed">
                            A new cycle begins. Your <span class="text-indigo-600 dark:text-white">Tasker</span> infrastructure is active and optimized for global performance.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-2xl pt-8">
                        <a href="{{ route('tasks') }}" class="glass p-8 rounded-3xl border border-gray-200 dark:border-white/5 hover:border-indigo-600 dark:hover:border-indigo-500/30 hover:bg-gray-50 dark:hover:bg-white/5 transition-all group">
                            <h3 class="text-lg font-black text-gray-900 dark:text-white mb-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">Go to Tasks</h3>
                            <p class="text-gray-500 dark:text-indigo-200/40 text-sm">Manage your client portal and active sprints.</p>
                        </a>
                        <a href="{{ route('profile') }}" class="glass p-8 rounded-3xl border border-gray-200 dark:border-white/5 hover:border-fuchsia-600 dark:hover:border-fuchsia-500/30 hover:bg-gray-50 dark:hover:bg-white/5 transition-all group">
                            <h3 class="text-lg font-black text-gray-900 dark:text-white mb-2 group-hover:text-fuchsia-600 dark:group-hover:text-fuchsia-400 transition-colors">Settings</h3>
                            <p class="text-gray-500 dark:text-indigo-200/40 text-sm">Fine-tune your personal identity and security.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
