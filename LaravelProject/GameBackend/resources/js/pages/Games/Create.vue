<script setup lang="ts">
import { useForm, Link } from '@inertiajs/vue3'
import type { Genre, Publisher } from '@/types'

defineProps<{
    genres:     Genre[]
    publishers: Publisher[]
}>()

const form = useForm({
    name:         '' as string,
    description:  '' as string,
    length:       '' as string,
    release_date: '' as string,
    genre_id:     '' as string,
    publisher_id: '' as string,
})

function submit(): void {
    form.post('/games')
}
</script>

<template>
    <div class="min-h-screen bg-[#0f0f13] px-6 py-12 flex items-center justify-center">
        <div class="w-full max-w-md">

            <Link
                href="/games"
                class="text-[11px] font-medium px-3 py-1 rounded-full bg-[#2a2a38] text-[#aaa] hover:text-white transition-colors inline-block mb-8"
            >
                ← Back
            </Link>

            <div class="bg-[#1a1a24] border border-[#2a2a38] rounded-xl p-8">
                <h1 class="text-lg font-semibold text-white mb-6">Create Game</h1>

                <form @submit.prevent="submit" class="space-y-4">

                    <div>
                        <label class="block text-[11px] uppercase text-[#666] mb-1">Name</label>
                        <input v-model="form.name" type="text"
                            class="w-full bg-[#0f0f13] border border-[#2a2a38] rounded-lg px-4 py-2 text-sm text-[#e2e2e2] outline-none focus:border-[#4a4a60]">
                        <p v-if="form.errors.name" class="text-red-400 text-xs mt-1">{{ form.errors.name }}</p>
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase text-[#666] mb-1">Description</label>
                        <input v-model="form.description" type="text"
                            class="w-full bg-[#0f0f13] border border-[#2a2a38] rounded-lg px-4 py-2 text-sm text-[#e2e2e2] outline-none focus:border-[#4a4a60]">
                        <p v-if="form.errors.description" class="text-red-400 text-xs mt-1">{{ form.errors.description }}</p>
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase text-[#666] mb-1">Length (hours)</label>
                        <input v-model="form.length" type="number" step="any"
                            class="w-full bg-[#0f0f13] border border-[#2a2a38] rounded-lg px-4 py-2 text-sm text-[#e2e2e2] outline-none focus:border-[#4a4a60]">
                        <p v-if="form.errors.length" class="text-red-400 text-xs mt-1">{{ form.errors.length }}</p>
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase text-[#666] mb-1">Release Date</label>
                        <input v-model="form.release_date" type="date"
                            class="w-full bg-[#0f0f13] border border-[#2a2a38] rounded-lg px-4 py-2 text-sm text-[#e2e2e2] outline-none focus:border-[#4a4a60]">
                        <p v-if="form.errors.release_date" class="text-red-400 text-xs mt-1">{{ form.errors.release_date }}</p>
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase text-[#666] mb-1">Genre</label>
                        <select v-model="form.genre_id"
                            class="w-full bg-[#0f0f13] border border-[#2a2a38] rounded-lg px-4 py-2 text-sm text-[#e2e2e2] outline-none focus:border-[#4a4a60]">
                            <option v-for="genre in genres" :key="genre.id" :value="genre.id">
                                {{ genre.name }} — {{ genre.subgenre }}
                            </option>
                        </select>
                        <p v-if="form.errors.genre_id" class="text-red-400 text-xs mt-1">{{ form.errors.genre_id }}</p>
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase text-[#666] mb-1">Publisher</label>
                        <select v-model="form.publisher_id"
                            class="w-full bg-[#0f0f13] border border-[#2a2a38] rounded-lg px-4 py-2 text-sm text-[#e2e2e2] outline-none focus:border-[#4a4a60]">
                            <option v-for="publisher in publishers" :key="publisher.id" :value="publisher.id">
                                {{ publisher.name }}
                            </option>
                        </select>
                        <p v-if="form.errors.publisher_id" class="text-red-400 text-xs mt-1">{{ form.errors.publisher_id }}</p>
                    </div>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full mt-2 py-2.5 bg-[#1e3a2a] text-[#4ade80] border border-[#2a5a3a] rounded-full text-sm font-medium hover:bg-[#2a5a3a] transition-colors disabled:opacity-50"
                    >
                        {{ form.processing ? 'Creating...' : 'Create Game' }}
                    </button>

                </form>
            </div>
        </div>
    </div>
</template>