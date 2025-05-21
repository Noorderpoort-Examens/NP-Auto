@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-3 md:my-4 lg:my-5">
        <h1 class="font-bold font-roboto text-3xl md:text-4xl lg:text-5xl text-center">Contacteer ons</h1>
        <p class="text-center font-opensans font-normal py-1 md:py-2 text-xs md:text-sm lg:text-base">Heb je vragen,
            opmerkingen of iets wat je graag wil bespreken? Neem dan gerust contact met ons op via één van de onderstaande
            manieren of vul het formulier in:
            <livewire:contact-details :is_contact_page="true" />

        </p>

        <div class="grid md:grid-cols-2 gap-3 md:gap-8 lg:gap-10 mt-3 md:mt-4 lg:mt-5">
            <div class="flex justify-center items-center">
                <div class="relative w-full h-96 flex flex-col lg:justify-center left-0 right-0 lg:right-8">
                    <iframe class="top-0 left-0 w-full h-full border border-np-dark rounded"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2389.803306596546!2d6.559752376671371!3d53.20344367224814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c832ae8b38fb37%3A0xf8ed82115525c5de!2sMuntinglaan%203%2C%209727%20JT%20Groningen!5e0!3m2!1snl!2snl!4v1747653022713!5m2!1snl!2snl"
                        width="600" height="450" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div>
                <h2 class="text-lg md:text-xl lg:text-2xl text-center font-medium font-roboto">Contact formulier</h2>
                <form class="bg-np-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <label class="block text-np-dark text-sm md:text-base lg:text-lg font-bold mb-2 uppercase"
                            for="name">
                            Naam
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-np-dark leading-tight focus:outline-none focus:shadow-outline"
                            id="name" type="text" placeholder="Vul hier je naam in">
                    </div>
                    <div class="mb-4">
                        <label class="block text-np-dark text-sm md:text-base lg:text-lg font-bold mb-2 uppercase"
                            for="email">
                            Email
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-np-dark leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="email" placeholder="Vul hier je email in">
                    </div>
                    <div class="mb-4">
                        <label class="block text-np-dark text-sm md:text-base lg:text-lg font-bold mb-2 uppercase"
                            for="username">
                            Bericht
                        </label>
                        <textarea id="message" rows="4"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-np-dark leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Vul hier je bericht in..."></textarea>
                    </div>
                    <div class="flex items-center justify-center">
                        <button
                            class="bg-np-dark hover:bg-np-yellow text-white font-bold py-2 px-4 text-sm md:text-base lg:text-lg rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out"
                            type="submit">
                            Verstuur contact aanvraag
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
