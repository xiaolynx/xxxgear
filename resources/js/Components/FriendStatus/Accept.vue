<template>
    <form @submit.prevent="acceptFriend">
        <green-button type="submit" class="text-xs">
            Chấp nhận
            <icon name="user-check" class="w-4 h-4 fill-current ml-1"></icon>
        </green-button>

    </form>
</template>
<script>
    import GreenButton from '../Buttons/GreenButton.vue';
    export default {
        props:['profile'],
        components:{
            GreenButton,
        },
        data() {
            return {
                acceptFriendForm: this.$inertia.form({
                    user: this.profile
                })
                
            }
        },
        methods: {
            acceptFriend() {
                this.loading = true
                this.acceptFriendForm.patch(this.route('friends.update', this.profile.id), {
                    preserveScroll: true,
                    onSuccess:()=>{}
                })
            }
        }
    }
</script>