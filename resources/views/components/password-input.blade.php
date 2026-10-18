@props(['disabled' => false])

<div x-data="{ show: false }" class="relative">
    <input :type="show ? 'text' : 'password'" @disabled($disabled) {{ $attributes->merge(['class' => 'block w-full rounded-xl border-0 bg-white/[0.07] py-3 pe-12 ps-4 text-sm text-white placeholder-white/30 ring-1 ring-white/10 transition focus:bg-white/10 focus:ring-2 focus:ring-lumin-magenta disabled:opacity-50']) }}>
    <button type="button" @click="show = !show" class="absolute inset-y-0 end-0 flex w-12 items-center justify-center text-white/50 transition hover:text-white" :aria-label="show ? 'Ocultar senha' : 'Mostrar senha'">
        <span x-show="!show"><x-icon name="eye" class="size-5" /></span>
        <span x-show="show" x-cloak><x-icon name="eye-off" class="size-5" /></span>
    </button>
</div>
