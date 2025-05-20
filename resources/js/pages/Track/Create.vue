<template>

  <Head title="Tracks" />

  <MusicLayout>
    <template #title>
      Tracks
    </template>

    <template #action>
      <Link :href="route('tracks.index')">
      Liste des musiques
      </Link>
    </template>

    <template #content>
      <form @submit.prevent="send">
        <!-- Title -->
        <div class="mb-3">
          <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
          <input v-model="form.title" type="text" name="title" id="title"
            class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2">
        </div>

        <!-- Artist -->
        <div class="mb-3">
          <label for="artist" class="block text-gray-700 text-sm font-bold mb-2">Artiste</label>
          <input v-model="form.artist" type="text" name="artist" id="artist"
            class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2">
        </div>

        <!-- Display -->
        <div class="mb-3">
          <label for="display" class="block text-gray-700 text-sm font-bold mb-2">Afficher la musique</label>
          <input v-model="form.display" type="checkbox" name="display" id="display">
        </div>

        <!-- Music -->
        <div class="mb-3">
          <label for="music" class="block text-gray-700 text-sm font-bold mb-2">Musique</label>
          <input @input="form.music = $event.target.files[0]" type="file" name="music" id="music">
        </div>

        <!-- Image -->
        <div class="mb-3">
          <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
          <input @input="form.image = $event.target.files[0]" type="file" name="image" id="image">
        </div>

        <input type="submit" value="Créer la musique"
          class="text-white font-bold rounded py-2 px-4 bg-blue-500 hover:bg-blue-700">
      </form>
    </template>
  </MusicLayout>
</template>

<script lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import MusicLayout from '@/layouts/MusicLayout.vue';

export default {
  name: 'Index',
  components: {
    Head,
    MusicLayout,
    Link,
  },
  data() {
    return {
      form: this.$inertia.form({
        title: '',
        artist: '',
        display: true,
        image: null,
        music: null,
      })
    }
  },
  methods: {
    send() {
      // this.$inertia.post(route('tracks.store'), this.form);
      this.form.post(route('tracks.store'));
    }
  }
}
</script>
