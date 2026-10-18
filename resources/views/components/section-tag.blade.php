<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-1.5 rounded-full bg-accent px-3 py-1 text-xs font-semibold text-accent-foreground']) }}>
    <x-icon name="sparkles" class="size-3.5" />
    {{ $slot }}
</span>
