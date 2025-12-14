<?php

namespace MrShaneBarron\Lightbox\Livewire;

use Livewire\Component;

class Lightbox extends Component
{
    public array $images = [];
    public bool $open = false;
    public int $currentIndex = 0;
    public bool $showThumbnails = true;
    public bool $showCounter = true;
    public bool $loop = true;

    public function mount(
        array $images = [],
        bool $showThumbnails = true,
        bool $showCounter = true,
        bool $loop = true
    ): void {
        $this->images = $images;
        $this->showThumbnails = $showThumbnails;
        $this->showCounter = $showCounter;
        $this->loop = $loop;
    }

    public function openAt(int $index): void
    {
        $this->currentIndex = $index;
        $this->open = true;
    }

    public function close(): void
    {
        $this->open = false;
    }

    public function next(): void
    {
        if ($this->currentIndex < count($this->images) - 1) {
            $this->currentIndex++;
        } elseif ($this->loop) {
            $this->currentIndex = 0;
        }
    }

    public function previous(): void
    {
        if ($this->currentIndex > 0) {
            $this->currentIndex--;
        } elseif ($this->loop) {
            $this->currentIndex = count($this->images) - 1;
        }
    }

    public function render()
    {
        return view('sb-lightbox::livewire.lightbox');
    }
}
