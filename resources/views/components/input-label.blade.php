@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xs font-semibold text-white/85']) }}>
    {{ $value ?? $slot }}
</label>
