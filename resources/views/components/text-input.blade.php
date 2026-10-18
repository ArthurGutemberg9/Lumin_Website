@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'block w-full rounded-xl border-0 bg-white/[0.07] px-4 py-3 text-sm text-white placeholder-white/30 ring-1 ring-white/10 transition focus:bg-white/10 focus:ring-2 focus:ring-lumin-magenta disabled:opacity-50']) }}>
