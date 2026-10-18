<x-guest-layout>
    <h1 class="text-2xl font-semibold">Recuperar senha</h1>
    <p class="mt-1 text-xs leading-relaxed text-white/60">Informe seu e-mail e enviaremos um link para você criar uma nova senha.</p>

    <!-- Session Status -->
    <x-auth-session-status class="mt-5" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="mt-1.5" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="w-full">Enviar link de recuperação</x-primary-button>
    </form>

    <p class="mt-6 text-center text-xs text-white/60">
        Lembrou da senha?
        <a href="{{ route('login') }}" class="font-medium text-lumin-cyan hover:underline">Faça o Login</a>
    </p>
</x-guest-layout>
