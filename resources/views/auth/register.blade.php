<x-guest-layout>
    <h1 class="text-2xl font-semibold">Cadastro</h1>
    <p class="mt-1 text-xs text-white/60">Crie sua conta e comece agora!</p>

    <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Nome de Usuário" />
            <x-text-input id="name" class="mt-1.5" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="mt-1.5" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Senha" />
            <x-password-input id="password" class="mt-1.5" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" value="Confirmar Senha" />
            <x-password-input id="password_confirmation" class="mt-1.5" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <label for="terms" class="flex items-start gap-2 text-xs leading-relaxed text-white/70">
            <input id="terms" type="checkbox" required class="mt-0.5 size-4 shrink-0 rounded border-white/30 bg-white/10 text-lumin-magenta focus:ring-lumin-magenta focus:ring-offset-0">
            <span>Eu aceito os <span class="text-lumin-pink">Termos de Uso</span> e <span class="text-lumin-pink">Política de Privacidade</span>.</span>
        </label>

        <x-primary-button class="w-full">Cadastrar</x-primary-button>
    </form>

    <p class="mt-6 text-center text-xs text-white/60">
        Já possui uma conta?
        <a href="{{ route('login') }}" class="font-medium text-lumin-cyan hover:underline">Faça o Login</a>
    </p>
</x-guest-layout>
