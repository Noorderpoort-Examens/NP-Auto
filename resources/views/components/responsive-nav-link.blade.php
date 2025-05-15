@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block w-full ps-3 pe-4 py-2 font-opensans border-l-2 border-np-dark text-sm font-medium focus:outline-none text-np-dark transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 font-opensans border-l-2 border-transparent text-sm font-medium text-np-dark hover:text-np-yellow focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
