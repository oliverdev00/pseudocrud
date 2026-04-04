<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 relative min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="glass sm:rounded-3xl p-8 border border-gray-200 dark:border-white/5 shadow-2xl">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="glass sm:rounded-3xl p-8 border border-gray-200 dark:border-white/5 shadow-2xl">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="glass sm:rounded-3xl p-8 border border-gray-200 dark:border-white/5 shadow-2xl">
                <div class="max-w-xl text-red-600 dark:text-red-400">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
