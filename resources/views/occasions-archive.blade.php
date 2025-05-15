@extends('layouts.app')

@section('title', 'Occasions Archive')

@section('content')
    <section class="py-8 antialiased bg-np-dark md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                    <h2 class="mt-3 font-semibold text-np-white text-3xl md:text-4xl lg:text-5xl">Occasions</h2>
            </div>

            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                @for ($i = 0; $i < 25; $i++)
                    <div class="relative rounded-lg border p-6 shadow-sm border-gray-700 bg-np-dark/40 h-max">
                        <a href="#" class="block group">
                            <div
                                class="relative overflow-hidden rounded-lg transform transition duration-150 ease-in-out group-hover:scale-110">
                                <img src="{{ asset('img/a1_1.jpeg') }}" alt="logo" class="block w-full rounded-lg">
                                <div
                                    class="absolute top-0 left-0 bg-red-600 text-white text-sm font-bold py-1 px-3 z-10 rounded">
                                    Verkocht
                                </div>
                            </div>
                        </a>

                        <div class="pt-6">
                            <p
                                class="text-sm md:text-base lg:text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                                Audi A3 Sportback
                            </p>
                            <p
                                class="text-sm md:text-base lg:text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                                €20.000
                            </p>

                            <div class="mt-4 flex items-center justify-between gap-4">
                                <button type="button"
                                    class="items-center w-full rounded-lg bg-np-yellow px-5 py-2.5 text-sm md:text-base lg:text-lg font-medium text-white hover:bg-np-yellow/90 focus:outline-none focus:ring-4 focus:ring-np-white transition duration-150 ease-in-out">
                                    Bekijk occasions
                                </button>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection
