@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-3 md:my-4 lg:my-5">
    <h1 class="font-bold font-roboto text-3xl md:text-4xl lg:text-5xl text-center">Contacteer ons</h1>
    <p class="text-center font-opensans font-normal py-1 md:py-2 text-xs md:text-sm lg:text-base">Heb je vragen, opmerkingen of iets wat je graag wil bespreken? Neem dan gerust contact met ons op via één van de onderstaande manieren of vul het formulier in:
        <livewire:contact-details />
    </p>
</div>

@endsection