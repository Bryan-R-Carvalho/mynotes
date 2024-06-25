<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/x-icon" href="icon.svg" />
        <title>{{ config('app.name', 'CoreNotes') }}</title>
        <!-- Fonts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
        <!-- Styles -->
        <style>
            textarea:focus, input:focus, select:focus {
                outline: 0;
            } 
            body {
                background-color: #F0F2F5;
            }
            .inter {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="inter antialiased grid">
        <nav class="bg-white shadow-md">
            <div class="flex items-center pt-3 pb-2">
                <a class="" href="/" title="Home">
                    <img src="icon.svg" alt="CoreNotes" class="px-3 md:px-4">
                </a>
                <p class="inter text-[#4B5563]" >CoreNotes</p>
                
                {{-- componente barra de busca --}}
                    <livewire:search-bar />
                
                <div class="ml-auto">
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="font-semibold hover:text-slate-500 text-slate-900 pr-4">Sair</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold hover:text-slate-500 text-slate-900">Entrar</a>
                        <a href="{{ route('register') }}" class="ml-2 font-semibold hover:text-slate-500 text-slate-900 pr-4">Registrar</a>
                    @endauth
                </div>
            </div>
        </nav>
        {{-- Componente PostNota --}}
        <livewire:nota-form />
        <livewire:container-notas />

    </body>

</html>