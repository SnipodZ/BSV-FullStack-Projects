<template>
  <div class="bg-[#1a1a24] border border-[#2a2a38] rounded-xl p-8">

    <h1 class="text-2xl font-semibold text-white mb-2">{{ game.name }}</h1>
    <p class="text-[#888] text-sm leading-relaxed mb-6">{{ game.description }}</p>

    <div class="flex flex-wrap gap-2 mb-6">
      <span class="text-[11px] font-medium px-3 py-0.5 rounded-full bg-[#1e3a2a] text-[#4ade80]">
        {{ game.release_date?.slice(0, 4) }}
      </span>
      <span class="text-[11px] font-medium px-3 py-0.5 rounded-full bg-[#1e2a3a] text-[#60a5fa]">
        {{ game.genre.name }}
      </span>
      <span class="text-[11px] font-medium px-3 py-0.5 rounded-full bg-[#2a1e3a] text-[#c084fc]">
        {{ game.publisher.name }}
      </span>
    </div>

    <div class="text-[#666] text-sm">
      <span class="text-[#aaa]">Length: </span>{{ game.length }}h
    </div>

  </div>
</template>

<script setup>
    // defineProps declara qué datos espera recibir del padre
    // si el padre no pasa 'game', Vue lanzará un warning
    defineProps({
    game: {
        type: Object,
        required: true
    }
    })
</script>