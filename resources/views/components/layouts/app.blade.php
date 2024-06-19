<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-slate-100 min-h-screen">
        @auth
        <div class="drawer lg:drawer-open">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                @livewire('partial.navbar')
              <!-- Page content here -->
                {{ $slot }}
            </div>
            <div class="drawer-side scrollbar-hide">
              <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
              @livewire('partial.sidebar')
            </div>
        </div>
        @endauth
        @guest
        <div class="flex flex-col justify-center items-center h-screen gap-8">
            <img src="{{ asset('assets/logo-unpatti.png') }}" class="w-24 mb-0"  alt="Logo Unpatti">
            <h1 class="font-bold text-4xl">{{ config('app.name') }}</h1>
            {{ $slot }}
        </div>
        @endguest

    </body>
</html>
