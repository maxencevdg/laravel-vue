<template>
    <div>
      <h1>Mes clés API</h1>
      <ul>
        <li v-for="key in apiKeys" :key="key.id">
          <strong>{{ key.name }}</strong> — <code>{{ key.key }}</code>
          <button @click="destroy(key.id)">Supprimer</button>
        </li>
      </ul>
      <form @submit.prevent="create">
        <input v-model="name" placeholder="Nom de la clé" required />
        <button type="submit">Créer</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { router, usePage } from '@inertiajs/vue3'
  
  const props = defineProps({ apiKeys: Array })
  const name = ref('')
  
  function create() {
    router.post('/api-keys', { name: name.value }, {
      onSuccess: () => { name.value = '' }
    })
  }
  
  function destroy(id) {
    router.delete(`/api-keys/${id}`)
  }
  </script>