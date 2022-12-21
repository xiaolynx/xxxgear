<template>
    <pages-layout>
        <template #title>
            <div class="flex flex-col items-center sm:flex-row sm:justify-between">
                <h2 class="flex items-end font-semibold text-xl text-gray-800 leading-tight">
                    <h2>Thông báo</h2>
                </h2>
                
            </div>
            <div>
                <h1>đã thích bài viết của bạn</h1>
            </div>
        </template>
        
        
    </pages-layout>
</template>
<script>
    import PagesLayout from '@/Layouts/PagesLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    export default {
        props: ['notifications'],
        components: {
            PagesLayout,
            Head,
            Link,
        },
        
    }
</script>