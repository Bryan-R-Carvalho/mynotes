<div class="flex flex-wrap justify-center">
    <div class="flex justify-center w-full pb-3">
        <p class="text-2xl font-semibold text-gray-800">Notas</p>
    </div>
    @auth
        <livewire:tags />
        <div class="flex flex-wrap justify-center pt-5 w-full">
            @foreach($favoritos as $favorito)
                @if($loop->first)
                    <p class="text-md w-full text-center">Favoritados</p>
                @endif
                <livewire:notas :notaId="$favorito->id" :key="$favorito->id" />
            @endforeach
        </div>
        <div class="flex flex-wrap justify-center pt-8 w-full">
            @foreach ($notas as $nota)
                @if($loop->first)
                    <p class="text-md w-full text-center">Outros</p>
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
</div>