<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
