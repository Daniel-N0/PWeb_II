@props([
'title',
'description'=>''
])

<div class="flex justify-between items-center">

    <div>

        <h1 class="text-4xl font-bold text-slate-800">
            {{ $title }}
        </h1>

        <p class="text-slate-500 mt-2">
            {{ $description }}
        </p>

    </div>

    <div>

        {{ $actions ?? '' }}

    </div>

</div>
