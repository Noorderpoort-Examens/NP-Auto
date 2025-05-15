<div>
    @php
        $count = count($occasions);
        $smCols = min($count, 2);
        $lgCols = min($count, 4);
    @endphp

    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($occasions as $occasion)
            @php
                $images = is_string($occasion->images) ? json_decode($occasion->images, true) : $occasion->images;
                $firstImage = is_array($images) ? $images[0] ?? null : null;

                $brand = ucfirst(strtolower($occasion->brand));
                $model = ucfirst(strtolower($occasion->model));
            @endphp

            <div class="relative rounded-lg border p-6 shadow-sm border-gray-700 bg-np-dark/40 h-max">
                <a href="#" class="block group">
                    <div class="relative rounded-lg transform transition duration-150 ease-in-out group-hover:scale-110">
                        @if ($firstImage)
                            <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $brand }} {{ $model }}"
                                class="block w-full rounded-lg" />
                        @else
                            <img src="{{ asset('img/fallback-image.png') }}" alt="{{ $brand }} {{ $model }}"
                                class="block w-full rounded-lg" />
                        @endif
                        <div
                            class="absolute top-0 left-0 bg-red-600 text-white text-sm font-bold py-1 px-3 z-10 rounded">
                            Verkocht
                        </div>
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
                        <button type="button"
                            class="items-center w-full rounded-lg bg-np-yellow px-5 py-2.5 text-sm md:text-base lg:text-lg font-medium text-white hover:bg-np-yellow/90 focus:outline-none focus:ring-4 focus:ring-np-white transition duration-150 ease-in-out">
                            Bekijk occasions
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
