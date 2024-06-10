<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-5xl py-8 text-customPurple-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="u-padding-width-section mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-2xl">
                    <p>{{ __("Bienvenido!") }}</p>
                </div>
                @if (auth()->user()->role == 'normal_user')
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:follow.follow-list>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>