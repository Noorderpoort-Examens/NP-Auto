<div class="mb-4 grid gap-4 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3">


    @foreach ($services as $service)
    <div class="relative rounded-lg p-6 shadow-sm bg-np-dark/90 h-60">
        <a href="#" class="block group">
            <h1 class="font-roboto text-lg md:text-xl lg:text-2xl font-semibold leading-tight text-white">
                {{ $service->title }}
            </h1>
        </a>
        <div class="flex flex-row text-xs pt-2 md:text-sm lg:text-base font-semibold leading-tight text-white">
            <p>Tijdsduur: {{ $service->serviceDuration->name }} </p>
            <p class="ms-auto">Prijs: €{{ number_format($service->price, 0, ',', '.')}} </p>
        </div>
        <div class="pt-2">
            <p class="text-xs md:text-sm lg:text-Base leading-tight text-white">
                {{ $service->description }}
            </p>
        </div>
    </div>
    @endforeach
</div>
