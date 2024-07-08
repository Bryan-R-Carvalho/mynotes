<div class="flex flex-wrap justify-center w-full pb-5">

    @foreach($cores as $cor)
        @php
            $numberCollor = App\Enums\CoresNota::getNumberByHex($cor);
            $tagName = $tags->where('cor', $numberCollor)->pluck('name')->first();
        @endphp
        
        <div class="relative group">
            <button wire:click="selectTag('{{ $cor }}')"  
                    class="rounded-full h-9 w-24 m-1 shadow-xl hover:border-solid hover:border-2 hover:border-black bg-[{{ $cor }}] z-10" 
                    style="@if($corTag == $cor) border: 2px solid black @endif"
                    title="Buscar cor">
                <p class="text-xs font-semibold text-gray-800">{{ $tagName !== null ? $tagName : '' }}</p>
            </button>

            <div class="absolute right-0 top-0 hidden group-hover:block" title="Nomear tag" x-data="{ open: false }">
                <button @click="open = ! open">
                    <svg wire:click="" class="h-6 w-6 cursor-pointer fill-none hover:fill-inherit" viewBox="0 0 24 24" stroke="currentColor" > 
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M15.232 5.232a3 3 0 114.242 4.242l-9.06 9.06a1.5 1.5 0 01-.682.384l-3.26.652a1 1 0 01-1.213-1.213l.652-3.26a1.5 1.5 0 01.384-.682l9.06-9.06z" />
                    </svg>
                </button>
            
                <div class="absolute right-0 top-0 mt-8 ms-6 z-20" x-show="open" x-transition @click.outside="open = false">
                    <div class="bg-white p-2 rounded-lg shadow-md w-56">
                        <form wire:submit.prevent="store({{ $numberCollor }})">
                            <input type="text" wire:model="tagName" class="w-40 h-8 p-1 border border-gray-300 rounded-md" placeholder="Nome da tag">
                            <button type="submit" class="h-8 w-8 m-1 shadow-xl bg-green-500 rounded-full hover:bg-green-600" title="salvar">
                                <p class="text-white">-></p>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    @endforeach
</div>