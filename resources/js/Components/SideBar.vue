<template>
    <aside class="flex flex-col bg-white shadow py-6 w-full sm:w-1/3 lg:w-1/6 lg:pl-4">
        <Link :href="link.route" v-for="link in sideBarLinks" :key="link.name" class="flex items-end pl-6 py-2" :class="route().current(link.route) ? 'text-white bg-gray-800 hover:bg-gray-500' : 'text-gray-800 hover:bg-indigo-400 hover:text-black'">
            <img :src="link.image" :alt="link.alt" class="h-8 w-8 rounded-full object-cover" v-if="link.image">
            <icon :name="link.icon" class="fill-current w-8 h-8" v-if="link.icon"></icon>
            <span class="ml-2">
                {{ link.name }}
            </span>
        </Link>
    </aside>
</template>

<script>
    import { Head, Link } from '@inertiajs/inertia-vue3'
    export default {
        components: {
            Head,
            Link,
        },
        computed: {
            sideBarLinks() {
                return [
                    { name: `${this.$page.props.user.name}`, image: `${this.$page.props.user.profile_photo_url}`, alt: `${this.$page.props.user.name}`, route: route('profiles.show',`${this.$page.props.user.name}`) },

                    { name: 'Khám phá', route: route('members.index'), icon: 'users' }, 

                    { name: 'Trang cá nhân', route: route('profile.show'), icon: 'user-edit' },
                   
                ]
            }
        }
    }
</script>
