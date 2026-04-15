<script setup lang="ts">
import { useForm, Link, usePage } from '@inertiajs/vue3'

const page = usePage()

const form = useForm({
    name:    '' as string,
    email:   '' as string,
    subject: '' as string,
    message: '' as string,
})

function submit(): void {
    form.post('/contact')
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
                <h1 class="text-lg font-semibold text-white mb-2">Contact Admin</h1>
                <p class="text-[#666] text-sm mb-6">Send a message to the administrator.</p>

                <div
                    v-if="(page.props.flash as any)?.success"
                    class="mb-4 px-4 py-3 rounded-lg bg-[#1e3a2a] border border-[#2a5a3a] text-[#4ade80] text-sm"
                >
                    {{ (page.props.flash as any).success }}
                </div>

                <form @submit.prevent="submit" class="space-y-4">

                    <div>
                        <label class="block text-[11px] uppercase text-[#666] mb-1">Name</label>
                        <input v-model="form.name" type="text"
                            class="w-full bg-[#0f0f13] border border-[#2a2a38] rounded-lg px-4 py-2 text-sm text-[#e2e2e2] outline-none focus:border-[#4a4a60]">
                        <p v-if="form.errors.name" class="text-red-400 text-xs mt-1">{{ form.errors.name }}</p>
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase text-[#666] mb-1">Email</label>
                        <input v-model="form.email" type="email"
                            class="w-full bg-[#0f0f13] border border-[#2a2a38] rounded-lg px-4 py-2 text-sm text-[#e2e2e2] outline-none focus:border-[#4a4a60]">
                        <p v-if="form.errors.email" class="text-red-400 text-xs mt-1">{{ form.errors.email }}</p>
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase text-[#666] mb-1">Subject</label>
                        <input v-model="form.subject" type="text"
                            class="w-full bg-[#0f0f13] border border-[#2a2a38] rounded-lg px-4 py-2 text-sm text-[#e2e2e2] outline-none focus:border-[#4a4a60]">
                        <p v-if="form.errors.subject" class="text-red-400 text-xs mt-1">{{ form.errors.subject }}</p>
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase text-[#666] mb-1">Message</label>
                        <textarea v-model="form.message" rows="4"
                            class="w-full bg-[#0f0f13] border border-[#2a2a38] rounded-lg px-4 py-2 text-sm text-[#e2e2e2] outline-none focus:border-[#4a4a60] resize-vertical"></textarea>
                        <p v-if="form.errors.message" class="text-red-400 text-xs mt-1">{{ form.errors.message }}</p>
                    </div>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full mt-2 py-2.5 bg-[#1e3a2a] text-[#4ade80] border border-[#2a5a3a] rounded-full text-sm font-medium hover:bg-[#2a5a3a] transition-colors disabled:opacity-50"
                    >
                        {{ form.processing ? 'Sending...' : 'Send Message →' }}
                    </button>

                </form>
            </div>
        </div>
    </div>
</template>