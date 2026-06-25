@props([
    'action',
    'placeholder' => 'Cari data...'
])

<form action="{{ $action }}" method="GET">

    <div class="flex flex-col md:flex-row gap-3">

        <div class="flex-1">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="{{ $placeholder }}"
                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3
               focus:ring-2 focus:ring-sky-500
               focus:border-sky-500 transition">

        </div>

        <x-button type="submit">
            Cari
        </x-button>

        @if(request('search'))

            <a href="{{ $action }}">

                <x-button
                    type="button"
                    variant="secondary">

                    Reset

                </x-button>

            </a>

        @endif

    </div>

</form>
