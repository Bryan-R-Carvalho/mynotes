<div class="flex justify-center w-full pb-5">

    @foreach($cores as $cor)
        @php
            $tagName = $tags->where('cor', $cor)->pluck('name')->first();
        @endphp

        <button wire:click="selectTag('{{ $cor }}')" 
        class="rounded-full h-9 w-20 m-1 pb shadow-xl hover:border-solid hover:border-2 hover:border-black bg-[{{ $cor }}]" style="@if($tags == $cor) border: 2px solid black @endif">
            <p class="text-sm text-gray-800">{{ $tagName !== null ? $tagName : '' }}</p></button>
    @endforeach
</div>