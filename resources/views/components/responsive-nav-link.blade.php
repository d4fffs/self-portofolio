@props(['active'])

@php
    $classes = $active ?? false ? 'text-yellow-400 font-semibold' : 'text-white hover:text-yellow-400';
@endphp

<a {{ $attributes->merge(['class' => 'inline-flex items-center px-1 pt-1 text-sm transition ' . $classes]) }}>
    {{ $slot }}
</a>
