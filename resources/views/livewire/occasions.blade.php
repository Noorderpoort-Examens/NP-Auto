<div>
    <div class="mb-4 grid gap-4 {{ $is_archive ? 'sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4' : 'md:grid-cols-3' }}">
        @foreach ($occasions as $occasion)
            @php
                $images = is_string($occasion->images) ? json_decode($occasion->images, true) : $occasion->images;
                $firstImage = is_array($images) ? $images[0] ?? null : null;

                $brand = ucfirst(strtolower($occasion->brand));
                $model = ucfirst(strtolower($occasion->model));

                $label = null;
                $labelClass = null;

                switch (true) {
                    case $occasion->sold:
                        $label = 'Verkocht';
                        $labelClass = 'bg-red-600';
                        break;
                    case $occasion->reserved:
                        $label = 'Gereserveerd';
                        $labelClass = 'bg-np-yellow';
                        break;
                    default:
                        break;
                }
            @endphp

            <div class="relative rounded-lg p-6 shadow-sm bg-np-dark/90 h-max">
                <a href="#" class="block group">
                    <div class="relative rounded-lg transform transition duration-150 ease-in-out group-hover:scale-110">
                        @if ($firstImage)
                            <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $brand }} {{ $model }}"
                                class="block w-full rounded-lg aspect-video" />
                        @else
                            <img src="{{ asset('img/fallback-image.png') }}" alt="{{ $brand }} {{ $model }}"
                                class="block w-full rounded-lg bg-np-color-shade aspect-video object-contain" />
                        @endif

                        @if ($label)
                            <div
                                class="absolute top-0 left-0 {{ $labelClass }} text-white text-sm font-bold py-1 px-3 z-10 rounded">
                                {{ $label }}
                            </div>
                        @endif
                    </div>
                </a>

                <div class="pt-6">
                    <p class="text-sm md:text-base lg:text-lg font-semibold leading-tight hover:underline text-white">
                        {{ ucfirst(strtolower($occasion->brand)) }} {{ ucfirst(strtolower($occasion->model)) }}
                    </p>
                    <p class="text-sm md:text-base lg:text-lg font-semibold leading-tight hover:underline text-white">
                        €{{ number_format($occasion->askprice, 0, ',', '.') }}
                    </p>

                    <div class="mt-4 flex items-center justify-between gap-4">
                        <a href="{{ route('occasions.show', $occasion->licenceplate) }}" type="button"
                            class="text-center w-full rounded-lg bg-np-yellow px-5 py-2.5 text-sm md:text-base lg:text-lg font-medium text-white hover:bg-np-yellow/90 focus:outline-none focus:ring-4 focus:ring-np-white transition duration-150 ease-in-out">
                            Bekijk occasion
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    @if ($is_archive)
        <div class="mt-6">
            {{ $occasions->links() }}
        </div>
    @endif

</div>
