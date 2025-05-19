<template>
  <div class="max-w-sm rounded shadow-lg">
    <div class="w-full">
      <!-- <img :src="`/storage/${track.image}`" /> -->
    </div>
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{ track.title }}</div>
      <small class="text-gray-700 text-base">{{ track.artist }}</small>
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded w-full mb-1">
      Lire
    </button>
  </div>
</template>

<script lang="ts">
export default {
  name: 'Track',
  props: {
    track: Object,
  },
}
</script>
