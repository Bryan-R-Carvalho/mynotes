<div class= "shadow-md py-4 px-4 mx-8 my-4 rounded-3xl  {{ $corNota == null ? 'bg-[#fff]' : 'bg-[' . $corNota . ']' }} h-[390px] w-[438px] z-10"> 
    <div class="flex items-center">
        <p class="text-sm font-semibold text-gray-800 max-h-8 text-pretty" >{{ $nota->titulo }}</p>
        <livewire:favoritar :nota="$nota" :key="$nota->id"  />
    </div>
    @if( $corNota == '#FFF') {{--null se a cor for branca, a borda é preta--}}
        <hr class="my-2 border border-gray-900">
    @else
        <hr class="my-2 border border-white ">
    @endif
    <p class="text-gray-600 min-h-64 max-h-64 text-pretty " >{{ $nota->conteudo }}</p>
    
    <div class="flex h-6">
        {{-- se nota tiver imagem mostra o nome --}}
        @if($nota->image)
            <p class="text-xs text-gray-800 font-semibold pe-4" title="{{ $nota->image }}">{{ $nota->image }}</p>
            <button type="button" class="btn">
                <img src="{{ asset('/storage/app/images/'. $nota->image) }}" >
            </button>
        @endif

    </div>
    
    <div class="flex ">

        {{-- editar nota --}}
        <a href="{{ route('notas.update', ['nota' => $nota->id]) }}" ><div class="hover:bg-slate-400 hover:bg-opacity-25 hover:rounded-full px-2 pt-2 pb-1 h-9 " title="Editar nota">
            <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 22 22" fill="currentColor" class="size-5">
                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
            </svg>
        </a></div>  

        {{-- alterar cor --}}
        <div :class="{ 'hover:bg-slate-400 hover:bg-opacity-25 hover:rounded-full': !open }" class="px-2 pt-2 pb-1 h-9" x-data="{ open: false }">
            <button @click="open = !open" :class="{ 'closed-styles': !open }" title="Selecionar cor">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" d="M2.25 4.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875V17.25a4.5 4.5 0 1 1-9 0V4.125Zm4.5 14.25a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd" />
                    <path d="M10.719 21.75h9.156c1.036 0 1.875-.84 1.875-1.875v-5.25c0-1.036-.84-1.875-1.875-1.875h-.14l-8.742 8.743c-.09.089-.18.175-.274.257ZM12.738 17.625l6.474-6.474a1.875 1.875 0 0 0 0-2.651L15.5 4.787a1.875 1.875 0 0 0-2.651 0l-.1.099V17.25c0 .126-.003.251-.01.375Z" />
                </svg>
            </button>

            <div x-show="open" x-transition @click.outside="open = false">
                <div class="flex-wrap bg-white p-2 rounded-lg shadow-md w-[19rem] z-50">
                    @foreach($cores as $cor)
                        <button
                            class="rounded-full h-9 w-9 m-1 shadow-xl hover:border-solid hover:border-2 hover:border-black bg-[{{ $cor }}]"
                            style="@if($corNota == $cor) border: 2px solid black @endif"
                            wire:click="changeColor({{ $nota->id }}, '{{ $cor }}')"
                            title="Selecionar cor"
                        ></button>
                    @endforeach
                </div>
            </div>  
        </div>


         {{-- anexar imagem--}}
        <div :class="{ 'hover:bg-slate-400 hover:bg-opacity-25 hover:rounded-full': !open }" class="px-2 pt-2 pb-1 h-9" x-data="{ open: false }">
            <button @click="open = !open" :class="{ 'closed-styles': !open }" title="Anexar imagem">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                </svg>
            </button>
            
            <div x-show="open" x-transition @click.outside="open = false">
                <div class="flex-wrap bg-white p-2 rounded-lg shadow-md w-[19rem] z-80">
                    <form wire:submit="uploadImage">
                        <input type="file" wire:model="image" class="w-full">
                        @error('image') <span class="error">{{ $message }}</span> @enderror

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-2">-></button>
                    </form>
                </div>
            </div>  
        </div>
             

        {{-- data de criação --}}
        <p class="text-xs text-gray-800 ml-auto font-semibold pt-2 pb-1 " title="{{ $nota->created_at->format('d/m/Y h:m') }}">{{ $nota->created_at->format('d/m/Y h:m') }}</p>

        {{-- deletar nota --}}
        <div class="hover:bg-slate-400 hover:bg-opacity-25 hover:rounded-full ml-auto px-2 pt-2 pb-1 h-9">
            <button
                type="button"
                wire:click="deleteNota({{ $nota->id }})"
                wire:confirm.prompt="Quer mesmo deletar a nota ( {{ $nota->titulo }} ) ? \n\n Digite 'DELETE' para confirmar.|DELETE" title="Deletar nota"
                title="Delete nota"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
       
    </div>
</div>
 