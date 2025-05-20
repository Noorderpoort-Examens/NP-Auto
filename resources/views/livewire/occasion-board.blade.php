<div class="">
    @php
        $images = is_string($occasion->images) ? json_decode($occasion->images, true) : $occasion->images;
    @endphp
    <div x-data="{ selectedImage: '{{ asset('storage/' . ($images[0] ?? 'img/fallback-image.png')) }}' }" class="max-w-4xl mx-auto bg-white shadow-lg my-3 lg:my-5 overflow-hidden rounded-lg">
        <div class="flex flex-col md:flex-row overflow-hidden mx-3 mb-2 md:min-h-80 my-2">
            <div class="w-full md:w-2/3 md:max-h-80">
                <img :src="selectedImage" alt="{{ $occasion->brand }} {{ $occasion->model }}" class="object-cover w-full h-full rounded">
            </div>

            <div class="w-full md:w-2/3 px-6 py-3 flex flex-col justify-between">
                <div>
                    <h2 class="font-roboto text-lg md:text-xl lg:text-2xl font-bold mb-1">{{ $occasion->advertisingtitle }}</h2>
                    <h3 class="font-opensans text-sm md:text-base lg:text-lg mb-1">Prijs: €{{ number_format($occasion->askprice, 2, ',', '.') }}</h3>
                    <p class="font-opensans text-xs md:text-sm lg:text-base text-gray-700 mb-1">{{ $occasion->description }}</p>
                </div>

                @if ($occasion->sold)
                    <div class="font-roboto mt-5 text-center w-full rounded-lg bg-red-600 px-5 py-2.5 text-sm md:text-base lg:text-lg font-medium text-white">
                        Verkocht
                    </div>
                @elseif ($occasion->reserved)
                    <div class="font-roboto mt-5 text-center w-full rounded-lg bg-np-yellow px-5 py-2.5 text-sm md:text-base lg:text-lg font-medium text-dark">
                        Gereserveerd
                    </div>
                @else
                    <button type="button" class="font-roboto mt-5 w-full rounded-lg bg-np-dark px-5 py-2.5 text-sm md:text-base lg:text-lg font-medium text-white hover:bg-np-yellow/90 focus:outline-none focus:ring-4 focus:ring-np-white transition">
                        Reserveren
                    </button>
                @endif
            </div>
        </div>
        @if (!empty($images))
            <div class="flex gap-2 p-4 overflow-x-auto justify-center">
                @foreach ($images as $img)
                    <div @click="selectedImage = '{{ asset('storage/' . $img) }}'"
                         :class="{ 'ring-4 ring-np-yellow': selectedImage === '{{ asset('storage/' . $img) }}' }"
                         class="cursor-pointer w-24 h-16 border rounded overflow-hidden">
                        <img src="{{ asset('storage/' . $img) }}" class="object-cover w-full h-full" alt="Thumbnail">
                    </div>
                @endforeach
            </div>
        @endif
        <div class="grid pb-3 lg:pb-5 grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2 text-xs md:text-sm lg:text-base mx-4">
            <p class="font-opensans">Kenteken: {{ $occasion->licenceplate }}</p>
            <p class="font-opensans">Merk: {{ucfirst(strtolower($occasion->brand)) }}</p>
            <p class="font-opensans">Model: {{ ucfirst(strtolower($occasion->model)) }}</p>
            <p class="font-opensans">Kleur: {{ ucfirst(strtolower($occasion->color)) }}</p>
            <p class="font-opensans">Bouwjaar: {{ $occasion->buildyear }}</p>
            <p class="font-opensans">Carrosserie: {{ $occasion->carbody }}</p>
            <p class="font-opensans">Brandstof: {{ $occasion->fuel }}</p>
            <p class="font-opensans">Brandstofverbruik: {{ $occasion->fuelconsumption }}</p>
            <p class="font-opensans">Zuinigheidsklasse: {{ $occasion->fuelefficiency }}</p>
            <p class="font-opensans">Kilometerstand: {{ number_format($occasion->mileage, 0, ',', '.') }} Km</p>
            <p class="font-opensans">Transmissie: {{ $occasion->transmission }}</p>
            <p class="font-opensans">Deuren: {{ $occasion->doors }}</p>
            <p class="font-opensans">Zitplaatsen: {{ $occasion->seats }}</p>
            <p class="font-opensans">APK tot: {{ $occasion->apk }}</p>
            <p class="font-opensans">Cilinderinhoud: {{ $occasion->cylindercapacity }}</p>
            <p class="font-opensans">Gewicht: {{ $occasion->weight }} Kg</p>
        </div>
    </div>
</div>
