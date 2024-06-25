<div>
    <form wire:submit.prevent="store" class=" bg-white shadow-md p-5 my-5 rounded-3xl mx-auto md:w-1/3 sm:w-96">
        <div class="flex flex-col items-center justify-between">
            <div class="flex w-full">
                <input type="text" wire:model="titulo" class="mr-auto border-solid pe-3 w-full font-bold" placeholder="Título">
                <button wire:click="alternarFavorito" type="button" class="ml-auto w-6 h-6">
                    @if($favoritado)
                        <img src="star2.svg" class="w-6 h-6" alt="Favoritado" title="Desfavoritar">
                    @else
                        <img src="star.svg" class="w-6 h-6" alt="Desfavoritado" title="Favoritar">
                    @endif
                </button>            
            </div>
            <hr class="my-2 w-full border-gray-700">
            <input type="text" wire:model="conteudo" class="mr-auto border-solid pe-3 pb-10 w-full" placeholder="Criar nota...">
            <button type="submit"></button>
        </div>
    </form>
</div>
