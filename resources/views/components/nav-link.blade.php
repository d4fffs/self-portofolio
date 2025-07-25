@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-3 py-2 border-b-2 border-yellow-400 text-sm font-medium leading-5 text-white focus:outline-none focus:border-yellow-500 transition duration-150 ease-in-out'
    : 'inline-flex items-center px-3 py-2 border-b-2 border-transparent text-sm font-medium leading-5 text-yellow-300 hover:text-yellow-300 hover:border-yellow-500 focus:outline-none focus:text-yellow-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>