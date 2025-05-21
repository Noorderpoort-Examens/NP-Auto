@extends('layouts.app')

@section('title', 'Welkom')

@section('content')

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

@endsection