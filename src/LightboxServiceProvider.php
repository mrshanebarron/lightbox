<?php

namespace MrShaneBarron\Lightbox;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\Lightbox\Livewire\Lightbox;
use MrShaneBarron\Lightbox\View\Components\Lightbox as BladeLightbox;
use Livewire\Livewire;

class LightboxServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sb-lightbox.php', 'sb-lightbox');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-lightbox');

        Livewire::component('sb-lightbox', Lightbox::class);

        $this->loadViewComponentsAs('ld', [
            BladeLightbox::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/sb-lightbox.php' => config_path('sb-lightbox.php'),
            ], 'sb-lightbox-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/sb-lightbox'),
            ], 'sb-lightbox-views');
        }
    }
}
