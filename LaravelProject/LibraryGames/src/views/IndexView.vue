<template>
  <div class="min-h-screen bg-[#0f0f13] px-6 py-12">
    <div class="max-w-5xl mx-auto">

      <h2 class="text-xs uppercase tracking-widest text-[#666] mb-5">Games</h2>

      <!-- Grid responsive igual que tu CSS original -->
      <div class="grid gap-4" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr))">

        <div
          v-for="game in games"
          :key="game.id"
          class="bg-[#1a1a24] border border-[#2a2a38] rounded-xl p-5"
        >
          <div class="text-base font-semibold text-white mb-2">{{ game.name }}</div>
          <div class="text-[13px] text-[#888] leading-relaxed mb-4">{{ game.description }}</div>

          <div class="flex flex-wrap gap-2">
            <!-- Badge año — verde -->
            <span class="text-[11px] font-medium px-3 py-0.5 rounded-full bg-[#1e3a2a] text-[#4ade80]">
              {{ game.release_date?.slice(0, 4) }}
            </span>
            <!-- Badge género — azul -->
            <span class="text-[11px] font-medium px-3 py-0.5 rounded-full bg-[#1e2a3a] text-[#60a5fa]">
              {{ game.genre.name }}
            </span>
            <!-- Badge publisher — púrpura -->
            <span class="text-[11px] font-medium px-3 py-0.5 rounded-full bg-[#2a1e3a] text-[#c084fc]">
              {{ game.publisher.name }}
            </span>

            <!-- RouterLink navega sin recargar la página -->
            <RouterLink
              :to="`/games/${game.id}`"
              class="text-[11px] font-medium px-3 py-0.5 rounded-full bg-[#2a2a38] text-[#aaa] hover:text-white transition-colors"
            >
              View Details →
            </RouterLink>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

// ref() hace que la variable sea reactiva — cuando cambie, la vista se actualiza sola
const games = ref([])

// onMounted se ejecuta cuando el componente carga por primera vez
// aquí es donde hacemos la única llamada a la API
onMounted(async () => {
  const response = await axios.get('http://127.0.0.1:8000/api/games')
  games.value = response.data
})
</script>