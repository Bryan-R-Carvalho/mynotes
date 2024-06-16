<div class= "shadow-md py-4 px-4 mx-8 my-4 rounded-3xl  {{ $corNota == null ? 'bg-[#fff]' : 'bg-[' . $corNota . ']' }} h-[390px] w-[438px]"> 
    <div class="flex items-center">
        <p class="text-sm font-semibold text-gray-800 max-h-8 text-pretty" >{{ $nota->titulo }}</p>
        <livewire:favoritar :nota="$nota" :key="$nota->id"  />
    </div>
    @if( $corNota == '#FFF') {{--null se a cor for branca, a borda é preta--}}
        <hr class="my-2 border border-gray-900">
    @else
        <hr class="my-2 border border-white ">
    @endif
    <p class="text-gray-600 min-h-72 max-h-72 text-pretty" >{{ $nota->conteudo }}</p>
    <div class="flex">
        {{-- editar nota --}}
        <a href="{{ route('notas.update', ['nota' => $nota->id]) }}" ><div class="hover:bg-slate-400 hover:bg-opacity-25 hover:rounded-full px-2 pt-2 pb-0 "><img src="edit.svg" alt="edit"></a></div>  

        {{-- alterar cor --}}
        <div :class="{ 'hover:bg-slate-400 hover:bg-opacity-25 hover:rounded-full': !open }" class="p-2 z-50" x-data="{ open: false }">
            <button @click="open = !open" :class="{ 'closed-styles': !open }"><img src="color.svg" alt="color"></button>

            <div x-show="open" x-transition @click.outside="open = false">
                <div class="flex-wrap bg-white p-2 rounded-lg shadow-md w-[19rem]">
                    @foreach($cores as $cor)
                        <button
                            class="rounded-full h-9 w-9 m-1 shadow-xl hover:border-solid hover:border-2 hover:border-black bg-[{{ $cor }}]"
                            style="@if($corNota == $cor) border: 2px solid black @endif"
                            wire:click="changeColor({{ $nota->id }}, '{{ $cor }}')"
                        ></button>
                    @endforeach
                </div>
            </div>  
        </div>
        <p class="text-xs text-gray-800 pt-2 ml-auto">{{ $nota->created_at->format('d/m/Y h:m') }}</p>
        {{-- deletar nota --}}
        <div class="hover:bg-slate-400 hover:bg-opacity-25 hover:rounded-full ml-auto px-2 pt-2 pb-0"><button
                type="button"
                wire:click="deleteNota({{ $nota->id }})"
                wire:confirm.prompt="Quer mesmo deletar a nota ( {{ $nota->titulo }} ) ? \n\n Digite 'DELETE' para confirmar.|DELETE">
                <img src="X.svg" alt="delete" >
            </button>
        </div>
       
    </div>
</div>
 