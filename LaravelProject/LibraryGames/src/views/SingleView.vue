<template>
  <div class="min-h-screen bg-[#0f0f13] px-6 py-12">
    <div class="max-w-5xl mx-auto">

      <!-- Botón para volver al índice -->
      <RouterLink to="/" class="text-[11px] uppercase tracking-widest text-[#666] hover:text-white transition-colors mb-8 inline-block">
        ← Back
      </RouterLink>

      <!-- Renderiza el hijo solo cuando el juego esté disponible -->
      <!-- Le pasa el objeto game completo como prop -->
      <Games v-if="game" :game="game" />

    </div>
  </div>
</template>

<script setup>
    import { ref, onMounted } from 'vue'
    import { useRouter } from 'vue-router'
    import axios from 'axios'
    import Games from '../components/Games.vue'

    // props recibe el :id de la URL gracias a props: true en el router
    const props = defineProps(['id'])
    const game = ref(null)
    const router = useRouter()

    onMounted(async () => {
    // Llamada individual solo para este juego
    const response = await axios.get(`http://127.0.0.1:8000/api/games/${props.id}`)
    game.value = response.data
    })
</script>