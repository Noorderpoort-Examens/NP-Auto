<div class="mb-4 grid gap-4 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3">


    @foreach ($services as $service)
    <div class="relative rounded-lg p-6 shadow-sm bg-np-dark/90 h-max">
        <a href="#" class="block group">
            <h1 class="font-roboto text-lg md:text-xl lg:text-2xl font-semibold leading-tight text-white">
                {{ $service->title }}
            </h1>
        </a>

        <div class="pt-3">
            <p class="text-sm md:text-base lg:text-lg font-semibold leading-tight text-white">
                {{ $service->description }}
            </p>
            <p class="text-sm md:text-base lg:text-lg font-semibold leading-tight hover:underline text-white">
                momgae
            </p>

            <div class="mt-4 flex items-center justify-between gap-4">
                hee hee hee ha
            </div>
        </div>
    </div>
    @endforeach

    <div class="relative rounded-lg p-6 shadow-sm bg-np-dark/90 h-max">
        <a href="#" class="block group">
            <h1 class="font-roboto text-sm md:text-base lg:text-lg font-semibold leading-tight text-white">
                me when ur mom
            </h1>
        </a>

        <div class="pt-6">
            <p class="text-sm md:text-base lg:text-lg font-semibold leading-tight text-white">
                me when ur mom
            </p>
            <p class="text-sm md:text-base lg:text-lg font-semibold leading-tight hover:underline text-white">
                momgae
            </p>

            <div class="mt-4 flex items-center justify-between gap-4">
                hee hee hee ha
            </div>
        </div>
    </div>
    @foreach ($services as $service)
        <div class="border rounded-xl shadow p-4 bg-white">
            <h2 class="text-lg font-semibold text-np-dark">{{ $service->title }}</h2>

            @if ($service->description)
                <p class="text-sm text-gray-600 mt-1">{{ $service->description }}</p>
            @endif

            @if ($service->serviceDuration)
                <p class="text-sm mt-2">
                    TijdsDuur: <span class="font-medium">{{ $service->serviceDuration->name }} </span>
                </p>
            @endif
        </div>
    @endforeach
</div>
