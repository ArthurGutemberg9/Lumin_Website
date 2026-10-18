<x-guest-layout>
    <h1 class="text-2xl font-semibold">Confirmar senha</h1>
    <p class="mt-1 text-xs leading-relaxed text-white/60">Esta é uma área segura. Confirme sua senha antes de continuar.</p>

    <form method="POST" action="{{ route('password.confirm') }}" class="mt-6 space-y-5">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Senha" />
            <x-password-input id="password" class="mt-1.5" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <x-primary-button class="w-full">Confirmar</x-primary-button>
    </form>
</x-guest-layout>
