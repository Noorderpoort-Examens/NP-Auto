@extends('layouts.app')

@section('title', 'Welkom')

@section('content')

<section class="relative container-shadow">
    <img class="w-full object-cover opacity-0 md:opacity-50 max-h-[604px]" src="{{ asset('img/autobedrijf.jpg') }}"
        alt="company-logo">

    <div class="absolute inset-0 flex flex-col items-center justify-center w-full h-full">
        <h1 class="text-np-dark text-3xl md:text-4xl lg:text-5xl font-bold font-roboto">Welkom bij NP Auto</h1>

        <livewire:general-info />
    </div>
</section>

<section class="my-9">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl md:text-4xl lg:text-5xl text-center mb-9 font-roboto font-bold">
            Meest recente occasions
        </h1>

        <livewire:occasions :is_archive="false" />

        <div class="w-full flex  flex-col justify-center items-center">
            <a class="w-full md:w-max text-center text-sm md:text-base lg:text-lg bg-np-yellow rounded-lg font-opensans font-semibold text-np-white px-16 py-3.5 md:px-24 md:py-4 lg:px-32 lg:py-4 hover:bg-np-dark hover:text-np-yellow transition duration-150 ease-in-out" href="{{route('occasions.archive')}}">Meer occasions</a>
        </div>
    </div>
</section>

<section class=" px-8">
    <div class="mx-auto my-3 md:my-4 lg:my-5 container-shadow">
        <h1 class="text-3xl md:text-4xl lg:text-5xl text-center mb-5 font-roboto font-bold">
            Openingstijden
        </h1>

        <div class="flex justify-center items-center">
            <livewire:opening-times />
        </div>

    </div>
</section>

@endsection