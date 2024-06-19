<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>
        <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-slate-100 min-h-screen">
        <div class="flex flex-col justify-center items-center h-screen gap-8">
            <img src="{{ asset('assets/logo-unpatti.png') }}" class="w-24 mb-0"  alt="Logo Unpatti">
            <h1 class="font-bold text-4xl">{{ config('app.name') }}</h1>
            <div class="card bg-base-100 border-2 border-base-300 p-10" >
                @if ($errors->any())
                    <div role="alert" class="alert alert-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('error'))
                <div role="alert" class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('error') }}
                </div>
                @endif

                <form class="card-body" action="{{ route('login') }}" method="POST">
                    @csrf
                    <h3 class="card-title">Silahkan Login</h3>
                    <div class="py-4 space-y-2">
                          <label @class(['input input-bordered flex items-center gap-2', 'input-error' => $errors->first('nik')])>
                            <x-tabler-user class="size-5"/>
                            <input type="text" name="nik" class="grow" placeholder="NIK" autocomplete="off" value="" required/>
                          </label>
                          <label @class(['input input-bordered flex items-center gap-2', 'input-error' => $errors->first('password')])>
                            <x-tabler-key class="size-5"/>
                            <input type="password" class="grow" name="password" placeholder="Password" value=""  autocomplete="off" required/>
                          </label>
                    </div>
                    <div class="card-actions">
                        <button type="submit" class="btn btn-default">
                            <x-tabler-login class="size-5" />
                            <span>Login Peserta</span>
                        </button>

                        {{-- <a class="btn btn-default">
                            <span><img src="{{ asset('assets/google.svg') }}" width="40px" class="p-0" alt=""></span>
                        </a> --}}
                        <a href="{{ route('sso.redirect') }}"  class="btn btn-info">
                            <x-tabler-key class="size-5" />
                            <span>Login Admin</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
