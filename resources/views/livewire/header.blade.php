<nav x-data="{ open: false }" class="text-white font-opensans container-shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="{{ route('home') }}" wire:navigate>
                        <img src="{{ asset('img/logo.svg') }}" alt="logo" width="150" class="block">
                    </a>
                </div>
            </div>

            <!-- Navigation Links (Desktop) -->
            <div class="hidden sm:flex font-normal sm:text-lg md:text-xl lg:text-2xl gap-5">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('occasions.archive')" :active="request()->routeIs('occasions.archive')" wire:navigate>
                    {{ __('Occasions') }}
                </x-nav-link>
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                    {{ __('Service & Onderhoud') }}
                </x-nav-link>
                <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" wire:navigate>
                    {{ __('Contact') }}
                </x-nav-link>
            </div>

            <!-- Hamburger for mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-np-dark hover:text-np-yellow focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden container-shadow">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')" wire:navigate>
                {{ __('Contact') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                {{ __('Nieuws') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
