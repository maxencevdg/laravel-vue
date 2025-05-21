<template>
  <div>
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
              <Link :href="route('test')"
                class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
              <img class="h-8 w-auto"
                src="/spotify.svg"
                alt="Your Company">
              </Link>
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <Link :href="route('tracks.index')" class="rounded-md px-3 py-2 text-sm font-medium"
                  :class="[route().current().includes('tracks') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']">
                Musiques
                </Link>
              </div>
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <div class="relative ml-3">
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="px-16">
      <div class="flex justify-between items-center">
        <h4 class="text-3xl font-bold my-6">
          <slot name="title" />
        </h4>
        <div>
          <slot name="action" />
        </div>
      </div>
      <slot name="content" />
    </div>
  </div>
</template>

<script lang="ts">
import { Link } from '@inertiajs/vue3';

export default {
  name: 'MusicLayout',
  components: {
    Link,
  },
}
</script>
