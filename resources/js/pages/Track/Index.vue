<template>

  <Head title="Tracks" />

  <MusicLayout>
    <template #title>
      Tracks
    </template>

    <template #action>
      Action
    </template>

    <template #content>
      <div class="grid grid-cols-4 gap-4">
        <Track v-for="track in tracks" :key="track.uuid" :track="track" />
      </div>
    </template>
  </MusicLayout>
</template>

<script lang="ts">
import { Head } from '@inertiajs/vue3';
import MusicLayout from '@/layouts/MusicLayout.vue';
import Track from '@/components/Track.vue';

export default {
  name: 'Index',
  components: {
    Head,
    MusicLayout,
    Track,
  },
  props: {
    tracks: Array,
  },
}
</script>
