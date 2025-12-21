<div>
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
        @foreach($this->images as $index => $image)
            <button
                type="button"
                wire:click="openAt({{ $index }})"
                style="position: relative; aspect-ratio: 1; overflow: hidden; border-radius: 8px; border: none; padding: 0; cursor: pointer; background: transparent;"
            >
                <img
                    src="{{ is_array($image) ? ($image['thumbnail'] ?? $image['src']) : $image }}"
                    alt="{{ is_array($image) ? ($image['alt'] ?? '') : '' }}"
                    style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;"
                    onmouseover="this.style.transform='scale(1.1)'"
                    onmouseout="this.style.transform='scale(1)'"
                >
            </button>
        @endforeach
    </div>

    @if($this->open)
    <div
        x-data
        @keydown.escape.window="$wire.close()"
        @keydown.arrow-left.window="$wire.previous()"
        @keydown.arrow-right.window="$wire.next()"
        style="position: fixed; inset: 0; z-index: 50; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,0.9);"
    >
        <button wire:click="close" style="position: absolute; top: 16px; right: 16px; color: rgba(255,255,255,0.7); background: transparent; border: none; cursor: pointer;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
            <svg style="width: 32px; height: 32px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <button wire:click="previous" style="position: absolute; left: 16px; color: rgba(255,255,255,0.7); background: transparent; border: none; cursor: pointer;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
            <svg style="width: 40px; height: 40px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>

        <button wire:click="next" style="position: absolute; right: 16px; color: rgba(255,255,255,0.7); background: transparent; border: none; cursor: pointer;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
            <svg style="width: 40px; height: 40px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>

        <div style="max-width: 64rem; max-height: 80vh;">
            @php $currentImage = $this->images[$this->currentIndex] ?? null; @endphp
            @if($currentImage)
                <img
                    src="{{ is_array($currentImage) ? $currentImage['src'] : $currentImage }}"
                    alt="{{ is_array($currentImage) ? ($currentImage['alt'] ?? '') : '' }}"
                    style="max-width: 100%; max-height: 80vh; object-fit: contain;"
                >
            @endif
        </div>

        @if($this->showCounter)
            <div style="position: absolute; bottom: 16px; left: 50%; transform: translateX(-50%); color: rgba(255,255,255,0.7);">
                {{ $this->currentIndex + 1 }} / {{ count($this->images) }}
            </div>
        @endif
    </div>
    @endif
</div>
