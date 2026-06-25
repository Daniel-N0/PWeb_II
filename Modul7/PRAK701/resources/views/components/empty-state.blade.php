@props([
    'icon' => null,
    'title',
    'description'
])

<div class="py-16 text-center">

    @if($icon)
        <div class="text-5xl mb-4">
            {{ $icon }}
        </div>
    @endif

    <h2 class="text-2xl font-bold text-slate-700">
        {{ $title }}
    </h2>

    <p class="mt-2 text-slate-500">
        {{ $description }}
    </p>

</div>
