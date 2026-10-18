<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lumin') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="bg-glow bg-dots flex min-h-screen flex-col items-center justify-center px-4 py-10">
            <a href="/" class="flex flex-col items-center gap-3" aria-label="Voltar para a página inicial">
                <x-application-logo class="size-24 rounded-full" />
            </a>

            <div class="panel mt-6 w-full max-w-md bg-surface/80 px-6 py-8 shadow-2xl shadow-black/40 backdrop-blur sm:px-8">
                {{ $slot }}
            </div>

            <a href="/" class="mt-6 text-xs text-white/50 transition hover:text-white">← Voltar para o início</a>
        </div>
    </body>
</html>
