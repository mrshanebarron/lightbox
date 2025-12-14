# Laravel Design Lightbox

Image lightbox gallery component for Laravel. Supports Livewire, Blade, and Vue 3.

## Installation

```bash
composer require mrshanebarron/lightbox
```

## Usage

### Livewire Component

```blade
<livewire:ld-lightbox />
```

### Blade Component

```blade
<x-ld-lightbox />
```

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=ld-lightbox-config
```

## Customization

### Publishing Views

```bash
php artisan vendor:publish --tag=ld-lightbox-views
```

## License

MIT
