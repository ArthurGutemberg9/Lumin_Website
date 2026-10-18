<x-guest-layout>
    <h1 class="text-2xl font-semibold">Verifique seu e-mail</h1>
    <p class="mt-1 text-xs leading-relaxed text-white/60">
        Obrigado por se cadastrar! Antes de começar, confirme seu e-mail clicando no link que acabamos de enviar. Se não recebeu, enviamos outro com prazer.
    </p>

    @if (session('status') == 'verification-link-sent')
        <x-auth-session-status class="mt-5" status="Um novo link de verificação foi enviado para o e-mail informado no cadastro." />
    @endif

    <div class="mt-6 flex flex-col gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="w-full">Reenviar e-mail de verificação</x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center">
            @csrf
            <button type="submit" class="text-xs text-white/60 transition hover:text-white hover:underline">Sair da conta</button>
        </form>
    </div>
</x-guest-layout>
