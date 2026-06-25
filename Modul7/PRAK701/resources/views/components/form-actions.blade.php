@props([
    'cancelUrl',
    'submitText' => 'Simpan',
    'submitVariant' => 'primary',
    'cancelText' => 'Batal'
])

<div class="flex items-center justify-between pt-6 border-t border-slate-200">

    <div>

        {{ $slot }}

    </div>

    <div class="flex gap-3">

        <a href="{{ $cancelUrl }}">
            <x-button variant="secondary">
                {{ $cancelText }}
            </x-button>
        </a>

        <x-button
            type="submit"
            variant="{{ $submitVariant }}">

            {{ $submitText }}

        </x-button>

    </div>

</div>
