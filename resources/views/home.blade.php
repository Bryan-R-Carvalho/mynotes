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
                <a class="" href="/">
                    <img src="icon.svg" alt="CoreNotes" class="px-3 md:px-4">
                </a>
                <p class="inter text-[#4B5563]" >CoreNotes</p>
                
                {{-- componente barra de busca --}}
                    <livewire:search-bar />
                 {{--<div class="ms-4 flex border-solid rounded-md shadow-md py-2 px-3 w-1/3">
                    
                    <form action="{{route('notas.search')}}" method="GET" class="flex w-full"> 
                        @csrf
                        <input type="text" name="search" class="w-full text-[1rem]" @auth placeholder="Pesquisar notas" @else placeholder="Faça login para pesquisar" @endauth>
                        <button type="submit" "><img class="h-full" src="search.svg" alt="search"></button>
                    </form> 
                </div>--}}
                {{-- componente barra de busca --}}
                
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
        {{-- <form action="{{ route('notas.store') }}" method="POST" class=" bg-white shadow-md p-5 my-5 rounded-3xl mx-auto md:w-1/2 sm:w-96">
            @csrf
            <div class="flex flex-col items-center justify-between">
                <div class="flex w-full">
                    <input type="text" name="titulo" class="mr-auto border-solid pe-3 w-full font-bold" placeholder="Título" value="{{ old('titulo') }}">
                    <button  class="ml-auto w-6 h-6" ><img src="star.svg" class="w-6 h-6" alt="Desfavoritar"></button>
                </div>
                <hr class="my-2 w-full border-gray-700">
                <input type="text" name="conteudo" class="mr-auto border-solid pe-3 pb-10 w-full" placeholder="Criar nota..." value="{{ old('conteudo') }}">
                <button type="submit" ></button>
            </div>
        </form> --}}
        {{-- Componente PostNota --}}

        {{-- Componente container nota --}}
        <livewire:container-notas />
        {{-- <div class="flex flex-wrap justify-center">
            <div class="flex justify-center w-full pb-3">
                <p class="text-2xl font-semibold text-gray-800">Notas</p>
            </div>
            @auth
                <livewire:tags />
                
                @foreach($favoritos as $favorito)
                    @if($loop->first)
                        <p class="text-sm">Favoritados</p>
                    @endif
                    <livewire:notas :notaId="$favorito->id" :key="$favorito->id" />
                @endforeach
                <div class="flex flex-wrap justify-center pt-8">
                    @foreach ($notas as $nota)
                            @if($loop->first)
                                <p class="text-sm h-6">Outros</p>
                            @endif
                            <livewire:notas :notaId="$nota->id" :key="$nota->id" />
                    @endforeach
                </div>
                    @if ($notas->isEmpty() and $favoritos->isEmpty() )
                        <p class="text-gray-800">Não há notas para exibir.</p>
                    @endif
                @else
                
                <div class="flex justify-center w-full">
                    <p class="inter text-gray-800 font-semibold text-xl">Faça login para ver suas notas</p>
                </div>
            @endauth
        </div> --}}
        {{-- Componente container nota --}}

    </body>

</html>