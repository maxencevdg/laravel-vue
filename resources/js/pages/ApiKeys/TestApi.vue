<template>
    <div>
      <h1>Tester une clé API</h1>
      <form @submit.prevent="fetchPlaylists">
        <input
          v-model="apiKey"
          placeholder="Entrez votre clé API"
          required
          style="width: 350px"
        />
        <button type="submit">Tester</button>
      </form>
      <div v-if="error" style="color: red; margin-top: 1em;">
        {{ error }}
      </div>
      <div v-if="playlists">
        <h2>Playlists reçues :</h2>
        <pre>{{ playlists }}</pre>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const apiKey = ref('')
  const playlists = ref(null)
  const error = ref('')
  
  async function fetchPlaylists() {
    playlists.value = null
    error.value = ''
    try {
      const response = await fetch('/api/playlists', {
        headers: {
          'x-api-key': apiKey.value,
          'Accept': 'application/json',
        },
      })
      if (!response.ok) {
        const data = await response.json()
        error.value = data.message || 'Erreur inconnue'
        return
      }
      playlists.value = await response.json()
    } catch (e) {
      error.value = 'Erreur réseau'
    }
  }
  </script>