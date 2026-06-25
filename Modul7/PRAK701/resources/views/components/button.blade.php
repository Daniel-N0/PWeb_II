@props([
    'type' => 'button',
    'variant' => 'primary'
])

@php
    $classes = [
        'primary' => 'bg-sky-600 hover:bg-sky-700 text-white',
        'warning' => 'bg-amber-500 hover:bg-amber-600 text-white',
        'danger'  => 'bg-red-500 hover:bg-red-600 text-white',
        'secondary' => 'bg-slate-200 hover:bg-slate-300 text-slate-800',
        'success' => 'bg-emerald-500 hover:bg-emerald-600 text-white',
    ];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'px-6 py-3 rounded-xl font-semibold shadow-lg transition duration-200 '
            . ($classes[$variant] ?? $classes['primary'])
    ]) }}
>
    {{ $slot }}
</button>
