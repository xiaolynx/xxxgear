<template>
    <pages-layout>
        <template #title>
            <div class="flex justify-between items-center w-full">
                <h2 class="flex items-end font-semibold text-xl text-gray-800 leading-tight">
                    <img :src="profile.profile_photo_url" :alt="profile.name" class="h-8 w-8 rounded-full object-cover">
                    <span class="capitalize ml-3">{{ `${profile.name}` }}</span>
                </h2>

                <status :profile="profile " 
                :isFriendsWith="isFriendsWith" 
                :friendRequestSentTo="friendRequestSentTo" :friendRequestRecievedFrom="friendRequestRecievedFrom"></status>
                </div>
        </template>

        <teamplate class="flex items-center w-full">
            <span>Tất cả</span>
            <span class="ml-4">Bạn bè</span>
        </teamplate>

        <combined-posts :posts="posts.data"></combined-posts>
    </pages-layout>
</template>

<script>
    import PagesLayout from '@/Layouts/PagesLayout.vue'
    import Status from '../../../Components/FriendStatus/Status.vue'
   
    import CombinedPosts from '@/Components/PostComment/CombinedPosts.vue';
    export default {
        props: ['profile','posts','isFriendsWith','friendRequestSentTo', 'friendRequestRecievedFrom'],
        components: {
            PagesLayout,
            Status,
            CombinedPosts,
        },
        data() {
            return {
                form: this.$inertia.form({
                    body: this.body,
                    user_id: this.profile.id
                }),
                allPosts: this.posts
            }
        },
        methods: {
            submit() {
                this.form.post(this.route('posts.store'), {
                    preserveScroll: true,
                    onSuccess:()=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Your post has successfully been published!'
                        })
                        this.form.body = null
                    }
                })
            },
        }
    }
</script>
