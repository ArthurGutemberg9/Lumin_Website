@props(['file', 'alt' => '', 'hero' => false, 'eager' => false])
{{-- Moldura de celular com uma tela do protótipo (public/images/screens/{file}.webp). --}}
<div {{ $attributes }}>
    <div class="relative rounded-[2rem] bg-[#15102b] p-[7px] shadow-[0_30px_60px_-20px_rgba(90,16,221,0.55)] ring-1 ring-white/15">
        <span class="absolute left-1/2 top-[11px] z-10 h-[5px] w-12 -translate-x-1/2 rounded-full bg-black/70"></span>
        <img
            src="{{ asset('images/screens/' . ($hero ? $file . '-hero' : $file) . '.webp') }}"
            alt="{{ $alt }}"
            width="378" height="640"
            loading="{{ ($hero || $eager) ? 'eager' : 'lazy' }}"
            class="block aspect-[378/640] w-full rounded-[1.6rem] object-cover"
        >
    </div>
</div>
