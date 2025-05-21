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
            <div>
                <h2 class="mb-6 text-sm font-semibold text-np-dark uppercase">Contact details</h2>
                <livewire:contact-details :is_contact_page="false" />
            </div>
            <div>
                <div class="relative w-full h-96 flex flex-col lg:justify-center left-0 right-0 lg:right-8">
                    <iframe class="top-0 left-0 w-full h-full border border-np-dark rounded"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2389.803306596546!2d6.559752376671371!3d53.20344367224814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c832ae8b38fb37%3A0xf8ed82115525c5de!2sMuntinglaan%203%2C%209727%20JT%20Groningen!5e0!3m2!1snl!2snl!4v1747653022713!5m2!1snl!2snl"
                        width="600" height="450" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="px-4 pb-6 md:flex md:items-center md:justify-center">
            <span class="text-sm text-np-dark/50 sm:text-center">© 2025
                <a class="hover:underline" href="{{ route('home') }}">NP-Auto</a>. All Rights Reserved.
            </span>
        </div>
    </div>
</footer>
