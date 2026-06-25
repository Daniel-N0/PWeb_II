@props([
    'label',
    'name',
    'type' => 'text',
    'placeholder' => '',
    'value' => ''
])

<div>

    <label
        for="{{ $name }}"
        class="block mb-2 text-sm font-semibold text-slate-700">

        {{ $label }}

        @if($attributes->has('required'))
            <span class="text-red-500">*</span>
        @endif

    </label>

    <input
        id="{{ $name }}"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"

    @php
        $baseClass = $errors->has($name)
            ? 'w-full rounded-xl border border-red-400 bg-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200'
            : 'w-full rounded-xl border border-slate-200 bg-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition duration-200';
    @endphp

    <input
        id="{{ $name }}"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => $baseClass
        ]) }}
    >


    @error($name)

    <p class="mt-2 text-sm text-red-500">
        {{ $message }}
    </p>

    @enderror

</div>
