<x-guest-layout>
    <h1 class="text-2xl font-semibold">Login</h1>
    <p class="mt-1 text-xs text-white/60">Entre para continuar aprendendo sem limites</p>

    <!-- Session Status -->
    <x-auth-session-status class="mt-5" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="mt-1.5" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Senha" />
            <x-password-input id="password" class="mt-1.5" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            @if (Route::has('password.request'))
                <div class="mt-2 text-right">
                    <a class="text-xs text-lumin-cyan transition hover:underline" href="{{ route('password.request') }}">Esqueceu sua senha?</a>
                </div>
            @endif
        </div>

        <!-- Remember Me -->
        <label for="remember_me" class="flex items-center gap-2 text-xs text-white/70">
            <input id="remember_me" type="checkbox" name="remember" class="size-4 rounded border-white/30 bg-white/10 text-lumin-magenta focus:ring-lumin-magenta focus:ring-offset-0">
            Lembrar de mim
        </label>

        <x-primary-button class="w-full">Entrar</x-primary-button>
    </form>

    @if (Route::has('register'))
        <p class="mt-6 text-center text-xs text-white/60">
            Não possui uma conta?
            <a href="{{ route('register') }}" class="font-medium text-lumin-cyan hover:underline">Cadastre-se</a>
        </p>
    @endif
</x-guest-layout>
