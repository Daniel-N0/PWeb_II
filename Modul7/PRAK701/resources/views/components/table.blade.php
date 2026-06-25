<div {{ $attributes->merge([
'class'=>'bg-white/70 backdrop-blur-xl rounded-3xl shadow-xl overflow-hidden'
]) }}>

    <div class="overflow-x-auto">

        {{ $slot }}

    </div>

</div>
