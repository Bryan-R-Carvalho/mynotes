<div class="ml-auto">
    @if ($nota->favoritado)
        <button wire:click="favoritar({{ $nota->id }})"  class="w-6 h-6" ><img src="star2.svg" class="w-6 h-6" alt="Desfavoritar"></button>
    @else
        <button wire:click="favoritar({{ $nota->id }})"  class="w-6 h-6"><img src="star.svg" class="w-6 h-6" alt="Favoritar"></button>
    @endif
</div>

