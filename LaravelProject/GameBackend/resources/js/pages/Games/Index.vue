<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import type { Game, Genre, Publisher } from '@/types'

defineProps<{
    games:      Game[]
    genres:     Genre[]
    publishers: Publisher[]
}>()
</script>

<template>
    <div class="min-h-screen bg-[#0f0f13] px-6 py-12">
        <div class="max-w-5xl mx-auto">

            <div class="flex items-center justify-between mb-8">
                <h1 class="text-white text-xl font-semibold">My Games</h1>
                <div class="flex gap-3">
                    <Link
                        href="/games/create"
                        class="text-[11px] font-medium px-4 py-1.5 rounded-full bg-[#1e3a2a] text-[#4ade80] border border-[#2a5a3a] hover:bg-[#2a5a3a] transition-colors"
                    >
                        + Create Game
                    </Link>
                    <Link
                        href="/contact"
                        class="text-[11px] font-medium px-4 py-1.5 rounded-full bg-[#2a2a38] text-[#aaa] hover:text-white transition-colors"
                    >
                        Contact Admin
                    </Link>
                </div>
            </div>

            <h2 class="text-xs uppercase tracking-widest text-[#666] mb-4">Games</h2>
            <div class="grid gap-4" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr))">
                <div
                    v-for="game in games"
                    :key="game.id"
                    class="bg-[#1a1a24] border border-[#2a2a38] rounded-xl p-5"
                >
                    <div class="text-base font-semibold text-white mb-2">{{ game.name }}</div>
                    <div class="text-[13px] text-[#888] leading-relaxed mb-4">{{ game.description }}</div>
                    <div class="flex flex-wrap gap-2 items-center">
                        <span class="text-[11px] font-medium px-3 py-0.5 rounded-full bg-[#1e3a2a] text-[#4ade80]">
                            {{ game.release_date?.slice(0, 4) }}
                        </span>
                        <span class="text-[11px] font-medium px-3 py-0.5 rounded-full bg-[#1e2a3a] text-[#60a5fa]">
                            {{ game.genre.name }}
                        </span>
                        <span class="text-[11px] font-medium px-3 py-0.5 rounded-full bg-[#2a1e3a] text-[#c084fc]">
                            {{ game.publisher.name }}
                        </span>
                        <Link
                            :href="`/games/${game.id}`"
                            class="text-[11px] font-medium px-3 py-0.5 rounded-full bg-[#2a2a38] text-[#aaa] hover:text-white transition-colors"
                        >
                            View Details →
                        </Link>
                    </div>
                </div>
            </div>

            <h2 class="text-xs uppercase tracking-widest text-[#666] mt-12 mb-4">Genres</h2>
            <div class="grid gap-3" style="grid-template-columns: repeat(auto-fill, minmax(160px, 1fr))">
                <div
                    v-for="genre in genres"
                    :key="genre.id"
                    class="bg-[#1a1a24] border border-[#2a2a38] rounded-xl p-4 text-sm text-[#ccc]"
                >
                    {{ genre.name }}<br>
                    <span class="text-xs text-[#666]">{{ genre.subgenre }}</span>
                </div>
            </div>

            <h2 class="text-xs uppercase tracking-widest text-[#666] mt-12 mb-4">Publishers</h2>
            <div class="grid gap-3" style="grid-template-columns: repeat(auto-fill, minmax(160px, 1fr))">
                <div
                    v-for="publisher in publishers"
                    :key="publisher.id"
                    class="bg-[#1a1a24] border border-[#2a2a38] rounded-xl p-4 text-sm text-[#ccc]"
                >
                    {{ publisher.name }}
                </div>
            </div>

        </div>
    </div>
</template>