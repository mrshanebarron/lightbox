<div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($images as $index => $image)
            <button
                type="button"
                wire:click="openAt({{ $index }})"
                class="relative aspect-square overflow-hidden rounded-lg group"
            >
                <img
                    src="{{ is_array($image) ? ($image['thumbnail'] ?? $image['src']) : $image }}"
                    alt="{{ is_array($image) ? ($image['alt'] ?? '') : '' }}"
                    class="w-full h-full object-cover transition-transform group-hover:scale-110"
                >
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors"></div>
            </button>
        @endforeach
    </div>

    @if($open)
    <div
        x-data
        @keydown.escape.window="$wire.close()"
        @keydown.arrow-left.window="$wire.previous()"
        @keydown.arrow-right.window="$wire.next()"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/90"
    >
        <button wire:click="close" class="absolute top-4 right-4 text-white/70 hover:text-white">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <button wire:click="previous" class="absolute left-4 text-white/70 hover:text-white">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>

        <button wire:click="next" class="absolute right-4 text-white/70 hover:text-white">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>

        <div class="max-w-4xl max-h-[80vh]">
            @php $currentImage = $images[$currentIndex] ?? null; @endphp
            @if($currentImage)
                <img
                    src="{{ is_array($currentImage) ? $currentImage['src'] : $currentImage }}"
                    alt="{{ is_array($currentImage) ? ($currentImage['alt'] ?? '') : '' }}"
                    class="max-w-full max-h-[80vh] object-contain"
                >
            @endif
        </div>

        @if($showCounter)
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-white/70">
                {{ $currentIndex + 1 }} / {{ count($images) }}
            </div>
        @endif
    </div>
    @endif
</div>
