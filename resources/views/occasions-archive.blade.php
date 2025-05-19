@extends('layouts.app')

@section('title', 'Occasions Archive')

@section('content')
    <section class="py-8 antialiased md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <h2 class="mt-3 font-semibold text-np-dark text-3xl md:text-4xl lg:text-5xl">Occasions</h2>
                <div class="flex items-center space-x-4">
                    <livewire:filter-modal-occasions />
                </div>
            </div>
            <livewire:occasions :is_archive="true" />
        </div>
    </section>
@endsection
