<div class="relative inline-block w-full">
    <button wire:click="openModal" type="button"
        class="flex items-center justify-center w-full rounded-lg border px-3 py-2 text-sm md:text-base lg:text-lg font-medium text-np-dark border-gray-600 bg-np-white hover:bg-np-dark/40">
        <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
        </svg>
        Filters
        <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 9-7 7-7-7" />
        </svg>
    </button>

    @if ($isOpen)
        <div
            class="absolute z-50 mt-2 w-full sm:w-max right-0 border container-shadow bg-np-dark/50 border-gray-600 rounded-lg shadow-lg p-4">
            <div class="flex items-start justify-between">
                <h3 class="text-lg font-medium text-np-white">Filters</h3>
                <button type="button" wire:click="closeModal"
                    class="ml-auto inline-flex items-center rounded-lg p-1.5 text-sm text-np-white hover:bg-gray-600">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form wire:submit.prevent="closeModal" class="mt-4 space-y-4">
                <div>
                    <h6 class="text-sm font-medium text-np-white mb-2">Status</h6>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <input id="all" type="radio" name="status"
                                wire:click="$dispatch('filterUpdated', { status: 'all' })" class="h-4 w-4" />
                            <label for="all" class="ml-2 text-sm text-white">Alle</label>
                        </li>
                        <li class="flex items-center">
                            <input id="new" type="radio" name="status"
                                wire:click="$dispatch('filterUpdated', { status: 'unsold' })" class="h-4 w-4" />
                            <label for="new" class="ml-2 text-sm text-white">Niet verkocht</label>
                        </li>
                        <li class="flex items-center">
                            <input id="used" type="radio" name="status"
                                wire:click="$dispatch('filterUpdated', { status: 'reserved' })" class="h-4 w-4" />
                            <label for="used" class="ml-2 text-sm text-white">Gereserveerd</label>
                        </li>
                    </ul>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" wire:click="closeModal"
                        class="rounded-lg w-full border border-np-white px-4 py-2 text-sm text-np-white hover:bg-np-dark">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
