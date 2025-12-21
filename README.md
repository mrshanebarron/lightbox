# Lightbox

An image lightbox gallery component for Laravel applications. Click to open images in fullscreen overlay with navigation. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/lightbox
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-lightbox :images="[
    ['src' => '/images/photo1.jpg', 'alt' => 'Photo 1'],
    ['src' => '/images/photo2.jpg', 'alt' => 'Photo 2'],
    ['src' => '/images/photo3.jpg', 'alt' => 'Photo 3']
]" />
```

### With Thumbnails and Captions

```blade
<livewire:sb-lightbox
    :images="$gallery"
    :columns="4"
/>
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `images` | array | `[]` | Array of image objects |
| `columns` | number | `3` | Grid columns |

## Vue 3 Usage

### Setup

```javascript
import { SbLightbox } from './vendor/sb-lightbox';
app.component('SbLightbox', SbLightbox);
```

### Basic Usage

```vue
<template>
  <SbLightbox :images="images" />
</template>

<script setup>
const images = [
  { src: '/images/photo1.jpg', alt: 'Mountain sunset' },
  { src: '/images/photo2.jpg', alt: 'Ocean view' },
  { src: '/images/photo3.jpg', alt: 'Forest path' }
];
</script>
```

### With Thumbnails and Captions

```vue
<template>
  <SbLightbox :images="gallery" :columns="4" />
</template>

<script setup>
const gallery = [
  {
    src: '/images/full/photo1.jpg',
    thumbnail: '/images/thumbs/photo1.jpg',
    alt: 'Beach sunset',
    caption: 'Sunset at Malibu Beach, California'
  },
  {
    src: '/images/full/photo2.jpg',
    thumbnail: '/images/thumbs/photo2.jpg',
    alt: 'Mountain peak',
    caption: 'View from the summit'
  }
];
</script>
```

### Portfolio Gallery

```vue
<template>
  <div class="container mx-auto p-8">
    <h2 class="text-2xl font-bold mb-6">Portfolio</h2>
    <SbLightbox
      :images="portfolio"
      :columns="3"
    />
  </div>
</template>

<script setup>
const portfolio = [
  { src: '/work/project1.jpg', caption: 'E-commerce Redesign' },
  { src: '/work/project2.jpg', caption: 'Mobile App UI' },
  { src: '/work/project3.jpg', caption: 'Brand Identity' },
  { src: '/work/project4.jpg', caption: 'Web Application' },
  { src: '/work/project5.jpg', caption: 'Marketing Campaign' },
  { src: '/work/project6.jpg', caption: 'Product Photography' }
];
</script>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `images` | Array | `[]` | Array of image objects |
| `columns` | Number | `3` | Grid columns for thumbnails |

## Image Object

```javascript
{
  src: '/path/to/full-image.jpg',  // Required - Full size image
  thumbnail: '/path/to/thumb.jpg', // Optional - Thumbnail (uses src if not set)
  alt: 'Image description',        // Optional - Alt text
  caption: 'Display caption'       // Optional - Shown below image
}
```

## Keyboard Navigation

| Key | Action |
|-----|--------|
| `Escape` | Close lightbox |
| `←` | Previous image |
| `→` | Next image |

## Features

- **Grid Gallery**: Responsive thumbnail grid
- **Fullscreen Overlay**: Dark backdrop lightbox
- **Navigation**: Previous/next arrows
- **Counter**: Shows current position (1 / 6)
- **Captions**: Optional image captions
- **Keyboard Support**: Arrow key navigation
- **Click Outside**: Close on backdrop click
- **Zoom Effect**: Thumbnail hover zoom

## Styling

Uses Tailwind CSS:
- Responsive grid layout
- Dark overlay backdrop
- White navigation arrows
- Smooth fade transitions
- Rounded thumbnails

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
