<div class="ms-4 flex border-solid rounded-md shadow-md py-2 px-3 w-1/3">
    <form wire:submit="eventSearch" class="flex w-full">
        @csrf
        <input type="text" wire:model="query" class="w-full text-[1rem]" @auth placeholder="Pesquisar notas" @else placeholder="Faça login para pesquisar" @endauth>
        <button type="submit"><img class="h-full" src="search.svg" alt="search"></button>
    </form>
</div>
