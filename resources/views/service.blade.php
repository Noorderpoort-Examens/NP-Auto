@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-3 md:my-4 lg:my-5">
    <h1 class="font-bold font-roboto text-3xl md:text-4xl lg:text-5xl text-center">Service & onderhoud</h1>
    <p class="text-center font-opensans font-normal py-1 md:py-2 text-xs md:text-sm lg:text-base">
        Wilt u bij ons onderhoud inplannen, zoek door de lijst van opties en bel ons om een afspraak te maken!
    </p>
    <livewire:service-list />
    <div class="grid md:grid-cols-2 gap-3 md:gap-8 lg:gap-10 mt-3 md:mt-4 lg:mt-5">
        <div class="flex justify-center items-center">
            <div class="relative w-100 h-96 flex flex-col lg:justify-center left-0 right-0 lg:right-8 bg-np-dark">
                temp
            </div>
        </div>

        <div>
            temp
        </div>
    </div>
</div>

@endsection
