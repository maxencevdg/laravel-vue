<template>

  <Head title="Tracks" />

  <MusicLayout>
    <template #title>
      Tracks
    </template>

    <template #action>
      <Link :href="route('tracks.create')">
      Ajouter une musique
      </Link>
    </template>

    <template #content>
      <div class="grid grid-cols-4 gap-4">
        <Track v-for="track in tracks" :key="track.uuid" :track="track" />
      </div>
    </template>
  </MusicLayout>
</template>

<script lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import MusicLayout from '@/layouts/MusicLayout.vue';
import Track from '@/components/Track.vue';

export default {
  name: 'Index',
  components: {
    Head,
    MusicLayout,
    Track,
    Link,
  },
  props: {
    tracks: Array,
  },
}
</script>
