<template>
    <div class="flex border-t border-gray-400 mt-5 py-5 space-x-5">
        <div class="flex-shrink-0">
            <Link :href="route('profiles.show', comment.user.name)">
                <img class="h-8 w-8 rounded-full object-cover" :src="comment.user.profile_photo_url" :alt="comment.user.name">
            </Link>
        </div>

        <div class="flex-1">
            <div>
                <h2 class="text-lg font-semibold">
                    <Link :href="route('profiles.show', comment.user.name)">{{ comment.user.name }}</Link>
                    </h2>
                <p class="bg-gray-100 rounded mt-3 px-3 py-2">
                    {{ comment.body }}
                </p>
            </div>
            <div class="flex items-end my-3">
                <div>
                    <span class="text-sm italic">3days ago</span>
                </div>
                <div class="flex ml-3">
                    <like :item="comment" :method="submitLike"></like>
                    <dislike :item="comment" :method="submitDislike" class="ml-2"></dislike>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Like from './Likes/Like.vue'
import Dislike from './Likes/Dislike.vue'
    export default {
        props: ['comment'],
        components: {
            Head,Link,
            Dislike,
            Like,
        },
        data() {
            return {
                likeForm: this.$inertia.form({
                    comment: this.comment
                }),
                dislikeForm: this.$inertia.form({
                    comment: this.comment
                }),
            }
        },
        methods: {
            submit(){
                this.form.post(this.route('posts.store'),{
                    
                }),
                this.form.body = null
            },
            submitLike() {
                this.likeForm.post(this.route('comment-like.store', this.comment.id), {
                    preserveScroll: true,
                    onSuccess:()=>{}
                })
            },
            submitDislike() {
                this.dislikeForm.delete(this.route('comment-like.destroy', this.comment.id), {
                    preserveScroll: true,
                    onSuccess:()=>{}
                })
            },
        }
    }
</script>
