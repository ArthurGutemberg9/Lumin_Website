@php
    $lumin = config('lumin');
    $groups = collect($lumin['prototypes'])->pluck('group')->unique()->values();
@endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-white">Dashboard · Demonstração técnica</h2>
                <p class="mt-1 text-xs text-white/55">Olá, {{ Auth::user()->name }}. Protótipos e especificações do TCC {{ $lumin['name'] }}.</p>
            </div>
            <span class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-white/5 px-3 py-1.5 text-xs text-white/75">
                <span class="size-2 rounded-full bg-lumin-cyan"></span>
                {{ $lumin['status'] }}
            </span>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl space-y-10 px-4 sm:px-6 lg:px-8">

            {{-- ===== Protótipos (Figma) ===== --}}
            <section x-data="{ tab: 'Todas', shot: null, title: '' }" @keydown.escape.window="shot = null">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <span class="eyebrow">Protótipo no Figma</span>
                        <h3 class="mt-3 text-2xl font-semibold tracking-tight">Telas do aplicativo</h3>
                        <p class="mt-1 text-xs text-white/55">Clique em uma tela para ampliar.</p>
                    </div>
                    @if ($lumin['figma_url'])
                        <a href="{{ $lumin['figma_url'] }}" target="_blank" rel="noreferrer" class="btn-ghost">
                            <x-icon name="external-link" class="size-4" /> Abrir no Figma
                        </a>
                    @else
                        <span class="rounded-lg border border-dashed border-white/20 px-4 py-2 text-xs text-white/50">
                            Link do Figma: defina LUMIN_FIGMA_URL no .env
                        </span>
                    @endif
                </div>

                <div class="mt-6 flex flex-wrap gap-2">
                    @foreach ($groups->prepend('Todas') as $group)
                        <button type="button" @click="tab = '{{ $group }}'"
                            :class="tab === '{{ $group }}' ? 'bg-white text-ink' : 'bg-white/5 text-white/70 hover:bg-white/10'"
                            class="rounded-lg px-4 py-1.5 text-xs font-semibold transition">
                            {{ $group }}
                        </button>
                    @endforeach
                </div>

                <div class="mt-8 grid grid-cols-2 gap-x-5 gap-y-10 sm:grid-cols-3 lg:grid-cols-5">
                    @foreach ($lumin['prototypes'] as $i => $proto)
                        <figure x-show="tab === 'Todas' || tab === '{{ $proto['group'] }}'" x-transition.opacity>
                            <button type="button" class="tilt block w-full rounded-[2rem] text-left" data-tilt="9"
                                @click="shot = '{{ asset('images/screens/' . $proto['file'] . '.webp') }}'; title = @js($proto['title'])">
                                <x-phone :file="$proto['file']" :alt="'Tela ' . $proto['title']" />
                            </button>
                            <figcaption class="mt-3">
                                <p class="text-[10px] font-medium uppercase tracking-widest text-lumin-cyan">{{ $proto['group'] }}</p>
                                <p class="mt-0.5 text-sm font-semibold">{{ sprintf('%02d', $i + 1) }} · {{ $proto['title'] }}</p>
                                <p class="mt-1 text-xs leading-relaxed text-white/55">{{ $proto['caption'] }}</p>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>

                {{-- Ampliar --}}
                <div x-show="shot" x-cloak x-transition.opacity @click="shot = null"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/85 p-6">
                    <div class="relative" @click.stop>
                        <button type="button" @click="shot = null" class="absolute -right-3 -top-3 z-10 flex size-9 items-center justify-center rounded-full bg-white text-ink" aria-label="Fechar">
                            <x-icon name="x" class="size-4" />
                        </button>
                        <img :src="shot" :alt="title" class="max-h-[85vh] w-auto rounded-[1.6rem] ring-1 ring-white/20">
                        <p class="mt-3 text-center text-sm text-white/80" x-text="title"></p>
                    </div>
                </div>
            </section>

            {{-- ===== Jornada ===== --}}
            <section class="panel p-6 sm:p-8">
                <span class="eyebrow">Fluxo do usuário</span>
                <ol class="mt-6 flex flex-wrap items-center gap-y-3 text-sm">
                    @foreach ($lumin['journey'] as $i => $step)
                        <li class="flex items-center">
                            <span class="inline-flex items-center gap-2 rounded-lg bg-white/[0.06] px-3 py-1.5 ring-1 ring-white/10">
                                <span class="text-[11px] font-semibold text-lumin-pink">{{ sprintf('%02d', $i + 1) }}</span>
                                {{ $step }}
                            </span>
                            @unless ($loop->last)
                                <x-icon name="arrow-right" class="mx-2 size-4 text-white/30" />
                            @endunless
                        </li>
                    @endforeach
                </ol>
            </section>

            {{-- ===== Fluxo técnico ===== --}}
            <section class="panel p-6 sm:p-8">
                <span class="eyebrow">Fluxo técnico</span>
                <h3 class="mt-3 text-xl font-semibold tracking-tight">Do quadro da câmera até a tradução na tela</h3>
                <ol class="mt-6 grid gap-3 md:grid-cols-5">
                    @foreach ($lumin['pipeline'] as $i => $step)
                        <li class="tilt rounded-xl bg-white/[0.04] p-4 ring-1 ring-white/10" data-tilt="10">
                            <span class="flex size-10 items-center justify-center rounded-lg bg-lumin-violet/25 text-lumin-pink ring-1 ring-lumin-violet/40">
                                <x-icon :name="$step['icon']" class="size-5" />
                            </span>
                            <p class="mt-3 text-sm font-semibold">{{ $i + 1 }}. {{ $step['title'] }}</p>
                            <p class="mt-1 text-xs leading-relaxed text-white/55">{{ $step['text'] }}</p>
                        </li>
                    @endforeach
                </ol>
            </section>

            {{-- ===== Funcionalidades + Stack ===== --}}
            <section class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="panel p-6 sm:p-8">
                    <h3 class="flex items-center gap-2 text-lg font-semibold">
                        <x-icon name="camera" class="size-5 text-lumin-pink" /> Funcionalidades
                    </h3>
                    <ul class="mt-5 space-y-3">
                        @foreach ($lumin['features'] as $feature)
                            <li class="flex items-center gap-3 rounded-xl bg-white/[0.04] p-4 text-sm ring-1 ring-white/10">
                                <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-lumin-violet/25 text-lumin-pink">
                                    <x-icon :name="$feature['icon']" class="size-4" />
                                </span>
                                {{ $feature['title'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="panel p-6 sm:p-8">
                    <h3 class="flex items-center gap-2 text-lg font-semibold">
                        <x-icon name="layers" class="size-5 text-lumin-cyan" /> Tecnologias do projeto
                    </h3>
                    <div class="mt-5 overflow-hidden rounded-xl ring-1 ring-white/10">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-white/[0.06] text-[11px] uppercase tracking-widest text-white/60">
                                <tr>
                                    <th class="px-4 py-3 font-medium">Categoria</th>
                                    <th class="px-4 py-3 font-medium">Tecnologias</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @foreach ($lumin['stack'] as $group)
                                    <tr>
                                        <td class="px-4 py-3 font-medium">{{ $group['category'] }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex flex-wrap gap-2">
                                                @foreach ($group['items'] as $item)
                                                    <span class="rounded-md bg-white/[0.06] px-2.5 py-0.5 text-xs text-white/85 ring-1 ring-white/10">{{ $item }}</span>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            {{-- ===== Laravel Breeze ===== --}}
            <section class="panel p-6 sm:p-8">
                <span class="eyebrow">Back end</span>
                <h3 class="mt-3 text-xl font-semibold tracking-tight">Laravel Breeze</h3>
                <p class="mt-1 text-xs text-white/55">Autenticação e rotas geradas pelo Breeze (Blade + Tailwind CSS), sem CRUD.</p>
                <div class="mt-6 overflow-x-auto rounded-xl ring-1 ring-white/10">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-white/[0.06] text-[11px] uppercase tracking-widest text-white/60">
                            <tr>
                                <th class="px-4 py-3 font-medium">Rota</th>
                                <th class="px-4 py-3 font-medium">Nome</th>
                                <th class="px-4 py-3 font-medium">Função</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach ($lumin['breeze_routes'] as $route)
                                <tr>
                                    <td class="px-4 py-3 font-mono text-xs text-lumin-cyan">{{ $route['uri'] }}</td>
                                    <td class="px-4 py-3 font-mono text-xs text-white/55">{{ $route['name'] }}</td>
                                    <td class="px-4 py-3">{{ $route['desc'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- ===== Como rodar ===== --}}
            <section class="grid grid-cols-1 gap-5 lg:grid-cols-3">
                @foreach (['api' => ['cloud', 'API'], 'mobile' => ['smartphone', 'Mobile']] as $key => [$icon, $label])
                    <div class="panel tilt flex flex-col p-6" data-tilt="7">
                        <div class="flex items-center gap-2 font-semibold">
                            <x-icon :name="$icon" class="size-5 text-lumin-pink" /> {{ $label }}
                        </div>
                        <ol class="mt-4 list-decimal space-y-2 pl-5 text-xs leading-relaxed text-white/65 [&_code]:rounded [&_code]:bg-white/10 [&_code]:px-1 [&_code]:text-white">
                            @foreach ($lumin['run'][$key]['steps'] as $step)
                                <li>{!! $step !!}</li>
                            @endforeach
                        </ol>
                        <div class="mt-auto pt-4">
                            <div class="flex items-center gap-3 rounded-lg bg-black/40 px-4 py-3 font-mono text-[11px] ring-1 ring-white/10">
                                <span class="text-lumin-cyan">$</span>
                                <code class="min-w-0 flex-1 truncate text-white/90">{{ $lumin['run'][$key]['command'] }}</code>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="rounded-2xl border border-lumin-magenta/30 bg-lumin-magenta/[0.07] p-6">
                    <div class="flex items-center gap-2 font-semibold">
                        <x-icon name="triangle-alert" class="size-5 text-lumin-pink" /> Observações do Mobile
                    </div>
                    <ul class="mt-4 space-y-3 text-xs leading-relaxed text-white/70">
                        @foreach ($lumin['run']['notes'] as $note)
                            <li class="flex gap-3">
                                <span class="mt-1.5 size-1.5 shrink-0 rounded-full bg-lumin-pink"></span>
                                {{ $note }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            {{-- ===== Equipe e atribuições ===== --}}
            <section>
                <span class="eyebrow">Equipe</span>
                <h3 class="mt-3 text-2xl font-semibold tracking-tight">Atribuições no desenvolvimento em Laravel</h3>
                <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($lumin['team'] as $member)
                        <div class="panel tilt p-5" data-tilt="10">
                            <div class="flex items-center gap-3">
                                <span class="flex size-12 items-center justify-center overflow-hidden rounded-xl text-sm font-semibold" style="background-image: linear-gradient(135deg, #5a10dd, #c41bd9)">@if (! empty($member['photo']))<img src="{{ asset($member['photo']) }}" alt="Foto de {{ $member['name'] }}" width="48" height="48" class="size-full object-cover">@else{{ $member['initials'] }}@endif</span>
                                <div class="min-w-0">
                                    <p class="truncate text-sm font-semibold">{{ $member['name'] }}</p>
                                    <a href="https://github.com/{{ $member['handle'] }}" target="_blank" rel="noreferrer" class="text-xs text-white/55 transition hover:text-lumin-cyan">{{ $member['handle'] }}</a>
                                </div>
                            </div>
                            <p class="mt-4 text-xs leading-relaxed {{ $member['role'] ? 'text-white/80' : 'italic text-white/40' }}">
                                {{ $member['role'] ?? 'Atribuição: preencher em config/lumin.php' }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
