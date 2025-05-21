<footer class="bg-np-white rounded-lg container-shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full p-4 ">
        <div class="grid sm:grid-cols-2 gap-4 sm:gap-8 px-4 py-6 lg:py-8 md:grid-cols-2">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-np-dark uppercase">Openingstijden</h2>
                <livewire:opening-times />
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-np-dark uppercase">Navigatie links</h2>
                <ul
                    class="grid sm:grid-cols-2 items-center gap-4 mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                    <a class="hover:text-np-yellow transition duration-150 ease-in-out text-xs md:text-sm lg:text-base font-opensans text-nowrap text-np-dark"
                        href="{{ route('home') }}">
                        Home
                    </a>
                    <a class="hover:text-np-yellow transition duration-150 ease-in-out text-xs md:text-sm lg:text-base font-opensans text-nowrap text-np-dark"
                        href="{{ route('home') }}">
                        Service & Onderhoud
                    </a>
                    <a class="hover:text-np-yellow transition duration-150 ease-in-out text-xs md:text-sm lg:text-base font-opensans text-nowrap text-np-dark"
                        href="{{ route('occasions.archive') }}">
                        Occasions
                    </a>
                    <a class="hover:text-np-yellow transition duration-150 ease-in-out text-xs md:text-sm lg:text-base font-opensans text-nowrap text-np-dark"
                        href="{{ route('contact') }}">
                        Contact
                    </a>
                </ul>
            </div>
        </div>
        <div class="px-4 pb-6 md:flex md:items-center md:justify-center">
            <span class="text-sm text-np-dark/50 sm:text-center">© 2025
                <a class="hover:underline" href="{{ route('home') }}">NP-Auto</a>. All Rights Reserved.
            </span>
        </div>
    </div>
</footer>
