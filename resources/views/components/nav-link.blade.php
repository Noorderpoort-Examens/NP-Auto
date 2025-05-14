@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1 font-opensans text-np-dark text-base font-medium leading-5 focus:outline-none transition duration-150 ease-in-out underline'
            : 'inline-flex items-center px-1 pt-1 font-opensans text-np-dark border-b-2 border-transparent text-base font-medium leading-5 hover:text-np-yellow focus:outline-none focus:text-np-yellow-alt transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
