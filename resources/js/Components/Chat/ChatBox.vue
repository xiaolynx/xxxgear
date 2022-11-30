<template>
    <div class="h-full overflow-y-auto border-b">
        <div class="border-b px-3 py-3" v-for="message in messages" :key="message.id" :class="message.user.id != $page.props.user.id ? 'text-right' : 'text-left bg-gray-600 text-gray-200'">
            <div class="flex items-center" :class="message.user.id != $page.props.user.id ? 'justify-end bg-gray-300' : ' '">
                <img :src="message.user.profile_photo_url" class="w-4 h-4 rounded-full object-cover" :alt="message.user.name">
                <Link :href="(route('profiles.show', message.user.name))">
                    <span class="font-semibold tracking-wider ml-1" :class="message.user.id != $page.props.user.id ? 'text-blue' : 'text-blue-300'">
                        {{ message.user.name }}
                    </span>
                </Link>
            </div>
            <div class="flex flex-col">
                <p class="text-sm">{{ message.body }}</p>
                <p class="text-xs italic">{{ message.timeAgo }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import { Head, Link } from '@inertiajs/inertia-vue3'
    export default {
        props: ['messages'],
        components:{
            Head, Link
        }
    }
</script>
