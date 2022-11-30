<template>
    <pages-layout>
        <div>
            <h3 class="font-semibold text-2xl text-gray-800 leading-tight ">
                Lời mời kết bạn
            </h3>
            <div v-if="requests.length <= 0" class="my-5">
                <h3 class="italic">Bạn chưa có lời mời kết bạn nào.</h3>
            </div>
            <user-block :items="requests" class="my-5"></user-block>
        </div>
        <div>
            <h3 class="font-semibold text-2xl text-gray-800 leading-tight ">
                Bạn bè
            </h3>
            <div v-if="friends.length <= 0">
                <h3 class="italic">Bạn chưa có bạn bè.</h3>
            </div>
            <user-block :items="friends" class="my-5"></user-block>
        </div>
       
    </pages-layout>
</template>

<script>
    import PagesLayout from '@/Layouts/PagesLayout.vue'
    import UserBlock from '@/Components/UserBlock.vue'
    export default {
        props: ['friends', 'requests'],
        components: {
            PagesLayout,
            UserBlock
        }
    }
</script>
