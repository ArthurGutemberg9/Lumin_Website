<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lumin — Explore, aprenda, conecte-se</title>
        <meta name="description" content="Lumin é um aplicativo de aprendizado de idiomas com tradução em tempo real de objetos do mundo real.">
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />

        <script>document.documentElement.classList.add('js')</script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @php
            $lumin = config('lumin');
            $navLinks = [
                'Início' => '#inicio',
                'Sobre' => '#sobre',
                'Telas' => '#telas',
                'Funcionalidades' => '#funcionalidades',
                'Como rodar' => '#como-rodar',
                'Equipe' => '#equipe',
            ];
        @endphp

        {{-- ===== Navbar ===== --}}
        <header x-data="{ open: false }" class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-ink/85 backdrop-blur-md">
            <nav class="mx-auto flex h-16 max-w-6xl items-center justify-between px-6">
                <a href="#inicio" class="flex items-center gap-3" aria-label="Lumin">
                    <img src="{{ asset('images/lumin-logo.png') }}" alt="Lumin" width="512" height="512" class="rounded-full" style="height:2.5rem;width:2.5rem">
                    <span class="text-lg font-semibold tracking-tight">Lumin</span>
                </a>

                <ul class="hidden items-center gap-7 text-sm text-white/70 lg:flex">
                    @foreach ($navLinks as $label => $href)
                        <li><a href="{{ $href }}" class="transition-colors hover:text-white">{{ $label }}</a></li>
                    @endforeach
                </ul>

                <div class="hidden items-center gap-3 lg:flex">
                    <a href="{{ $lumin['github_url'] }}" target="_blank" rel="noreferrer" aria-label="Repositório no GitHub" class="flex size-10 items-center justify-center rounded-lg border border-white/15 text-white/80 transition hover:border-white/40 hover:text-white">
                        <x-icon name="github" class="size-5" />
                    </a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-brand">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-2 text-sm font-medium text-white/80 transition hover:text-white">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-brand">Cadastrar</a>
                        @endif
                    @endauth
                </div>

                <button type="button" @click="open = !open" class="lg:hidden" aria-label="Abrir menu">
                    <span x-show="!open"><x-icon name="menu" class="size-6" /></span>
                    <span x-show="open" x-cloak><x-icon name="x" class="size-6" /></span>
                </button>
            </nav>

            <div x-show="open" x-cloak class="border-t border-white/10 bg-ink px-6 py-4 lg:hidden">
                <ul class="space-y-3 text-sm text-white/80">
                    @foreach ($navLinks as $label => $href)
                        <li><a href="{{ $href }}" @click="open = false" class="block hover:text-white">{{ $label }}</a></li>
                    @endforeach
                    <li><a href="{{ $lumin['github_url'] }}" target="_blank" rel="noreferrer" class="block hover:text-white">GitHub</a></li>
                    @auth
                        <li><a href="{{ route('dashboard') }}" class="block font-semibold text-lumin-pink">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="block hover:text-white">Entrar</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="block font-semibold text-lumin-pink">Cadastrar</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        </header>

        {{-- ===== Hero ===== --}}
        <section id="inicio" class="bg-glow bg-dots relative overflow-hidden pt-16">
            <div class="mx-auto grid max-w-6xl items-center gap-14 px-6 py-20 lg:grid-cols-[1.05fr_0.95fr] lg:py-28">
                <div>
                    <span class="eyebrow reveal" data-reveal>TCC · Aprendizado de idiomas</span>
                    <h1 class="reveal mt-6 text-5xl font-bold leading-[1.05] tracking-tight sm:text-6xl lg:text-7xl" data-reveal>
                        Explore.<br>
                        <span class="text-gradient-pink">Aprenda.</span><br>
                        <span class="text-gradient-blue">Conecte-se.</span>
                    </h1>
                    <p class="reveal mt-6 max-w-lg text-base leading-relaxed text-white/70" data-reveal>
                        O <strong class="font-semibold text-white">Lumin</strong> é um aplicativo de aprendizado de idiomas com tradução em tempo real de objetos do mundo real: aponte a câmera e veja o vocabulário aparecer.
                    </p>

                    <div class="reveal mt-9 flex flex-wrap items-center gap-3" data-reveal>
                        <a href="#sobre" class="btn-brand">
                            Conhecer o projeto
                            <x-icon name="arrow-right" class="size-4" />
                        </a>
                        <a href="{{ $lumin['github_url'] }}" target="_blank" rel="noreferrer" class="btn-ghost">
                            <x-icon name="github" class="size-4" />
                            Ver no GitHub
                        </a>
                    </div>
                </div>

                {{-- Telas do protótipo: seguem o mouse quando ele passa por perto --}}
                <div data-follow class="reveal relative mx-auto h-[480px] w-full max-w-md sm:h-[540px]" data-reveal style="perspective: 1100px">
                    <div class="absolute inset-x-8 top-10 h-72 rounded-full bg-lumin-magenta/25 blur-3xl"></div>
                    <x-phone file="home" alt="Tela Home do protótipo" data-depth="0.6" class="absolute right-[2%] top-[4%] z-0 w-[47%] opacity-95 will-change-transform" />
                    <x-phone file="camera" :hero="true" alt="Tela da câmera: objeto destacado e tradução" data-depth="1" class="absolute bottom-0 left-[4%] z-10 w-[58%] will-change-transform" />
                </div>
            </div>
            <div class="section-edge"></div>
        </section>

        {{-- ===== Sobre ===== --}}
        <section id="sobre" class="mx-auto max-w-6xl px-6 py-24">
            <div class="grid gap-12 lg:grid-cols-2">
                <div>
                    <span class="eyebrow reveal" data-reveal>Sobre o projeto</span>
                    <h2 class="section-title reveal" data-reveal>
                        Tecnologia que conecta você ao <span class="text-gradient-blue">mundo.</span>
                    </h2>
                    <div class="reveal mt-6 space-y-4 text-sm leading-relaxed text-white/65" data-reveal>
                        @foreach ($lumin['about'] as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="grid gap-4 sm:grid-cols-2">
                        @foreach ($lumin['highlights'] as $i => $item)
                            <div class="panel tilt reveal p-5" data-reveal data-tilt="10">
                                <span class="text-xs font-semibold text-lumin-pink">0{{ $i + 1 }}</span>
                                <p class="mt-2 text-sm font-medium leading-snug">{{ $item }}</p>
                            </div>
                        @endforeach
                    </div>
                    <blockquote class="reveal border-l-2 border-lumin-magenta pl-5 text-lg font-medium leading-snug text-white/90" data-reveal>
                        {{ $lumin['quote'] }}
                    </blockquote>
                </div>
            </div>
        </section>

        {{-- ===== Telas ===== --}}
        <section id="telas" class="section-fade py-24">
            <div class="mx-auto max-w-6xl px-6">
                <span class="eyebrow reveal" data-reveal>Protótipo no Figma</span>
                <h2 class="section-title reveal" data-reveal>Telas do aplicativo</h2>
                <p class="reveal mt-3 text-sm text-white/60" data-reveal>Passe o mouse sobre uma tela para pausar o carrossel.</p>
            </div>

            <div class="marquee reveal mt-12" data-reveal>
                <div class="marquee-track">
                    @foreach ([false, true] as $copy)
                        <div class="marquee-group" @if ($copy) aria-hidden="true" @endif>
                            @foreach ($lumin['prototypes'] as $i => $proto)
                                <figure class="w-[210px] shrink-0">
                                    <div class="tilt rounded-[2rem]" data-tilt="9">
                                        <x-phone :file="$proto['file']" :alt="$copy ? '' : 'Tela ' . $proto['title']" :eager="true" />
                                    </div>
                                    <figcaption class="mt-4">
                                        <p class="text-[11px] font-medium uppercase tracking-widest text-lumin-cyan">{{ $proto['group'] }}</p>
                                        <p class="mt-1 text-sm font-semibold">{{ sprintf('%02d', $i + 1) }} · {{ $proto['title'] }}</p>
                                    </figcaption>
                                </figure>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <div class="section-edge"></div>

        {{-- ===== Funcionalidades + Stack ===== --}}
        <section id="funcionalidades" class="mx-auto max-w-6xl px-6 py-24">
            <span class="eyebrow reveal" data-reveal>Nesta versão</span>
            <h2 class="section-title reveal" data-reveal>Funcionalidades</h2>

            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($lumin['features'] as $i => $feature)
                    <div class="panel tilt reveal group relative overflow-hidden p-6 hover:border-lumin-magenta/50" data-reveal data-tilt="10">
                        <span class="absolute -right-2 -top-4 select-none text-7xl font-bold text-white/[0.04]">{{ $i + 1 }}</span>
                        <span class="flex size-11 items-center justify-center rounded-xl bg-lumin-violet/25 text-lumin-pink ring-1 ring-lumin-violet/40">
                            <x-icon :name="$feature['icon']" class="size-5" />
                        </span>
                        <p class="mt-5 text-sm font-medium leading-snug">{{ $feature['title'] }}</p>
                    </div>
                @endforeach
            </div>

            <div id="tecnologias" class="mt-20">
                <span class="eyebrow reveal" data-reveal>Stack principal</span>
                <h2 class="section-title reveal" data-reveal>Tecnologias</h2>
                <div class="mt-10 grid gap-4 md:grid-cols-3">
                    @foreach ($lumin['stack'] as $group)
                        <div class="panel tilt reveal p-6" data-reveal data-tilt="8">
                            <div class="flex items-center gap-2 text-sm font-semibold">
                                <x-icon :name="$group['icon']" class="size-4 text-lumin-cyan" />
                                {{ $group['category'] }}
                            </div>
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach ($group['items'] as $item)
                                    <span class="rounded-md bg-white/[0.06] px-3 py-1 text-xs font-medium text-white/85 ring-1 ring-white/10">{{ $item }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===== Como rodar ===== --}}
        <section id="como-rodar" class="section-fade py-24">
            <div class="mx-auto max-w-6xl px-6">
                <span class="eyebrow reveal" data-reveal>Passo a passo</span>
                <h2 class="section-title reveal" data-reveal>Como rodar</h2>
                <p class="reveal mt-3 text-sm text-white/60" data-reveal>Siga os passos para executar o projeto em sua máquina.</p>

                <div class="mt-10 grid grid-cols-1 gap-5 lg:grid-cols-3">
                    @foreach (['api' => ['cloud', 'API'], 'mobile' => ['smartphone', 'Mobile']] as $key => [$icon, $label])
                        <div class="panel tilt reveal flex flex-col p-6" data-reveal data-tilt="7" x-data="{ copied: false }">
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
                                    <button type="button"
                                        @click="navigator.clipboard.writeText(@js($lumin['run'][$key]['command'])); copied = true; setTimeout(() => copied = false, 1500)"
                                        class="shrink-0 text-white/50 transition hover:text-white" aria-label="Copiar comando">
                                        <span x-show="!copied"><x-icon name="copy" class="size-4" /></span>
                                        <span x-show="copied" x-cloak class="text-lumin-cyan"><x-icon name="check" class="size-4" /></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="tilt reveal rounded-2xl border border-lumin-magenta/30 bg-lumin-magenta/[0.07] p-6" data-reveal data-tilt="7">
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
                </div>
            </div>
        </section>

        <div class="section-edge"></div>

        {{-- ===== Equipe ===== --}}
        <section id="equipe" class="mx-auto max-w-6xl px-6 py-24">
            <span class="eyebrow reveal" data-reveal>Equipe</span>
            <h2 class="section-title reveal" data-reveal>Quem desenvolveu o Lumin</h2>

            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($lumin['team'] as $member)
                    <div class="panel tilt reveal p-6" data-reveal data-tilt="12">
                        <span class="flex size-20 items-center justify-center overflow-hidden rounded-2xl text-xl font-semibold text-white ring-2 ring-lumin-magenta/50" style="background-image: linear-gradient(135deg, #5a10dd, #c41bd9)">
                            @if (! empty($member['photo']))
                                <img src="{{ asset($member['photo']) }}" alt="Foto de {{ $member['name'] }}" width="80" height="80" loading="lazy" class="size-full object-cover">
                            @else
                                {{ $member['initials'] }}
                            @endif
                        </span>
                        <p class="mt-5 text-base font-semibold">{{ $member['name'] }}</p>
                        <a href="https://github.com/{{ $member['handle'] }}" target="_blank" rel="noreferrer" class="mt-2 inline-flex items-center gap-2 text-xs text-white/60 transition hover:text-lumin-cyan">
                            <x-icon name="github" class="size-4" />
                            {{ $member['handle'] }}
                            <x-icon name="arrow-up-right" class="size-3" />
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ===== Chamada final ===== --}}
        <section class="mx-auto max-w-6xl px-6 pb-24">
            <div class="reveal bg-glow relative overflow-hidden rounded-3xl border border-white/10 bg-surface px-8 py-14 text-center" data-reveal>
                <h2 class="mx-auto max-w-xl text-3xl font-semibold leading-tight tracking-tight sm:text-4xl">Veja a demonstração técnica no painel</h2>
                <p class="mx-auto mt-3 max-w-md text-sm text-white/65">Entre para ver os protótipos completos, o fluxo técnico e as rotas do Laravel Breeze.</p>
                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-brand">Abrir dashboard <x-icon name="arrow-right" class="size-4" /></a>
                    @else
                        <a href="{{ route('login') }}" class="btn-brand">Entrar <x-icon name="arrow-right" class="size-4" /></a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-ghost">Criar conta</a>
                        @endif
                    @endauth
                </div>
            </div>
        </section>

        {{-- ===== Footer ===== --}}
        <footer x-data class="relative py-8">
            <div class="section-edge absolute inset-x-0 top-0"></div>
            <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-6">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/lumin-logo.png') }}" alt="Lumin" width="512" height="512" class="rounded-full" style="height:2rem;width:2rem">
                    <p class="text-xs text-white/55">© {{ date('Y') }} Lumin · Projeto de TCC</p>
                </div>
                <div class="flex items-center gap-4 text-white/60">
                    <a href="{{ $lumin['github_url'] }}" target="_blank" rel="noreferrer" aria-label="GitHub" class="transition hover:text-white"><x-icon name="github" class="size-5" /></a>
                    <button type="button" @click="$dispatch('open-linkedin')" aria-label="LinkedIn da equipe" class="transition hover:text-white"><x-icon name="linkedin" class="size-5" /></button>
                </div>
            </div>
        </footer>

        {{-- ===== Popup: LinkedIn da equipe ===== --}}
        <div x-data="{ open: false }" x-effect="document.body.style.overflow = open ? 'hidden' : ''"
             @open-linkedin.window="open = true" @keydown.escape.window="open = false"
             x-show="open" x-cloak x-transition.opacity
             class="fixed inset-0 z-[60] flex items-center justify-center bg-black/80 p-4 backdrop-blur-sm"
             @click.self="open = false" role="dialog" aria-modal="true" aria-label="LinkedIn da equipe">
            <div x-show="open" x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="translate-y-4 scale-95 opacity-0" x-transition:enter-end="translate-y-0 scale-100 opacity-100"
                 class="panel w-full max-w-md bg-surface p-6 shadow-2xl shadow-black/50">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <span class="eyebrow reveal" data-reveal>Equipe</span>
                        <h3 class="mt-3 text-xl font-semibold tracking-tight">LinkedIn da equipe</h3>
                        <p class="mt-1 text-xs text-white/55">Clique para abrir o perfil de cada integrante.</p>
                    </div>
                    <button type="button" @click="open = false" class="flex size-9 shrink-0 items-center justify-center rounded-lg border border-white/15 text-white/70 transition hover:border-white/40 hover:text-white" aria-label="Fechar">
                        <x-icon name="x" class="size-4" />
                    </button>
                </div>

                <ul class="mt-6 space-y-2.5">
                    @foreach ($lumin['team'] as $member)
                        <li>
                            <a href="{{ $member['linkedin'] }}" target="_blank" rel="noopener noreferrer"
                               class="group flex items-center gap-4 rounded-xl bg-white/[0.04] p-3 ring-1 ring-white/10 transition hover:bg-white/[0.08] hover:ring-lumin-magenta/50">
                                <span class="flex size-11 shrink-0 items-center justify-center overflow-hidden rounded-xl text-sm font-semibold" style="background-image: linear-gradient(135deg, #5a10dd, #c41bd9)">@if (! empty($member['photo']))<img src="{{ asset($member['photo']) }}" alt="" width="44" height="44" class="size-full object-cover">@else{{ $member['initials'] }}@endif</span>
                                <span class="min-w-0 flex-1">
                                    <span class="block text-sm font-semibold">{{ $member['name'] }}</span>
                                    <span class="block truncate text-[11px] text-white/50">{{ preg_replace('#^https?://(www\.)?#', '', $member['linkedin']) }}</span>
                                </span>
                                <x-icon name="arrow-up-right" class="size-4 shrink-0 text-white/40 transition group-hover:text-lumin-pink" />
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </body>
</html>
