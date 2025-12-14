<?php

namespace MrShaneBarron\lightbox;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\lightbox\Livewire\lightbox;
use MrShaneBarron\lightbox\View\Components\lightbox as Bladelightbox;
use Livewire\Livewire;

class lightboxServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-lightbox.php', 'ld-lightbox');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-lightbox');

        Livewire::component('ld-lightbox', lightbox::class);

        $this->loadViewComponentsAs('ld', [
            Bladelightbox::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ld-lightbox.php' => config_path('ld-lightbox.php'),
            ], 'ld-lightbox-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/ld-lightbox'),
            ], 'ld-lightbox-views');
        }
    }
}
