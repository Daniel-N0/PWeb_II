@props([
    'title',
    'value'
])

<div
    class="bg-white/70 backdrop-blur-xl rounded-3xl border border-white/30
           shadow-lg p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

    <p class="text-sm font-medium text-slate-500 uppercase tracking-wide">
        {{ $title }}
    </p>

    <h2 class="mt-3 text-5xl font-bold text-sky-600">
        {{ $value }}
    </h2>

</div>
