@props([
'type'=>'success'
])

@php

    $colors=[
    'success'=>'bg-emerald-100 border-emerald-300 text-emerald-700',
    'danger'=>'bg-red-100 border-red-300 text-red-700',
    'warning'=>'bg-yellow-100 border-yellow-300 text-yellow-700'
    ];

@endphp

<div class="border rounded-xl p-4 {{ $colors[$type] }}">
    {{ $slot }}
</div>
