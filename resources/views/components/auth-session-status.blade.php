@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'rounded-lg border border-lumin-cyan/30 bg-lumin-cyan/10 px-4 py-3 text-sm text-lumin-cyan']) }}>
        {{ $status }}
    </div>
@endif
