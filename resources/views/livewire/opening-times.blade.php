@php
use Carbon\Carbon;

// Groepeer de tijden in twee kolommen
$chunks = $openingTime->chunk(3);
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-5">
    @foreach ($chunks as $chunk)
    <div class="flex flex-col gap-4">
        @foreach ($chunk as $time)
        <div class="flex">
            <p class="text-xs md:text-sm lg:text-base font-opensans text-nowrap">
                {{ $time->day }}
                {{ Carbon::parse($time->start)->format('H:i') }}
                tot
                {{ Carbon::parse($time->end)->format('H:i') }}
            </p>
        </div>
        @endforeach
    </div>
    @endforeach
</div>