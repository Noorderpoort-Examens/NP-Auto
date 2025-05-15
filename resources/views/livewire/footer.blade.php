<footer class="bg-np-white rounded-lg shadow-sm container-shadow">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <span class="text-sm text-np-dark sm:text-center">© 2025 <a href="{{ route('home') }}"
                class="hover:underline">NP-Auto</a>
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <x-nav-link :href="route('home')" wire:navigate>
                {{ __('Home') }}
            </x-nav-link>
            <x-nav-link :href="route('home')" wire:navigate>
                {{ __('Occasions') }}
            </x-nav-link>
            <x-nav-link :href="route('home')" wire:navigate>
                {{ __('Service & Onderhoud') }}
            </x-nav-link>
            <x-nav-link :href="route('home')" wire:navigate>
                {{ __('Contact') }}
            </x-nav-link>
        </ul>
    </div>
</footer>
