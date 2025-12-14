<template>
  <div>
    <div class="grid gap-2" :style="{ gridTemplateColumns: `repeat(${columns}, 1fr)` }">
      <div v-for="(image, index) in images" :key="index" @click="open(index)" class="cursor-pointer overflow-hidden rounded-lg">
        <img :src="image.thumbnail || image.src" :alt="image.alt || ''" class="w-full h-full object-cover hover:scale-105 transition-transform">
      </div>
    </div>

    <Teleport to="body">
      <Transition name="fade">
        <div v-if="isOpen" class="fixed inset-0 z-50 bg-black/90 flex items-center justify-center" @click.self="close">
          <button @click="close" class="absolute top-4 right-4 text-white hover:text-gray-300 z-10">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
          </button>

          <button v-if="images.length > 1" @click="prev" class="absolute left-4 text-white hover:text-gray-300">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
          </button>

          <div class="max-w-5xl max-h-[90vh] px-16">
            <img :src="currentImage.src" :alt="currentImage.alt || ''" class="max-w-full max-h-[80vh] object-contain">
            <p v-if="currentImage.caption" class="text-white text-center mt-4">{{ currentImage.caption }}</p>
          </div>

          <button v-if="images.length > 1" @click="next" class="absolute right-4 text-white hover:text-gray-300">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          </button>

          <div v-if="images.length > 1" class="absolute bottom-4 text-white text-sm">
            {{ currentIndex + 1 }} / {{ images.length }}
          </div>
        </div>
      </Transition>
    </Teleport>
  </div>
</template>

<script>
import { ref, computed, onMounted, onUnmounted } from 'vue';

export default {
  name: 'LdLightbox',
  props: {
    images: { type: Array, default: () => [] },
    columns: { type: Number, default: 3 }
  },
  setup(props) {
    const isOpen = ref(false);
    const currentIndex = ref(0);

    const currentImage = computed(() => props.images[currentIndex.value] || {});

    const open = (index) => { currentIndex.value = index; isOpen.value = true; };
    const close = () => { isOpen.value = false; };
    const prev = () => { currentIndex.value = currentIndex.value === 0 ? props.images.length - 1 : currentIndex.value - 1; };
    const next = () => { currentIndex.value = currentIndex.value === props.images.length - 1 ? 0 : currentIndex.value + 1; };

    const handleKeydown = (e) => {
      if (!isOpen.value) return;
      if (e.key === 'Escape') close();
      if (e.key === 'ArrowLeft') prev();
      if (e.key === 'ArrowRight') next();
    };

    onMounted(() => document.addEventListener('keydown', handleKeydown));
    onUnmounted(() => document.removeEventListener('keydown', handleKeydown));

    return { isOpen, currentIndex, currentImage, open, close, prev, next };
  }
};
</script>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity 0.3s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
</style>
