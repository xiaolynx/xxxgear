<template>
    <div class="flex mt-5 sm:mt-0">
        <template v-if="friendRequestRecievedFrom">
            <accept :profile="profile"></accept>
            <ignore :profile="profile" class="ml-3"></ignore>
        </template>
        
        <template v-else-if="friendRequestSentTo">
            <h3 class="font-semibold text-md text-gray-800 leading-tight">
                Chờ xác nhận
            </h3>
        </template>

        <template v-else-if="isFriendsWith">
            <form @submit.prevent="deleteFriend">
                <jet-danger-button type="submit">
                    <fingerprint-spinner
                        :animation-duration="1500"
                        :size="20"
                        class="text-white"
                        v-if="loading"
                    />
                    <template v-else>
                        Xóa bạn
                        <icon name="user-mark" class="w-4 h-4 fill-current ml-1"></icon>
                    </template>
                </jet-danger-button>
            </form>
        </template>

        <template v-else-if="$page.props.user.id !== profile.id">
            <form @submit.prevent="addFriend">
                <blue-button type="submit" class="text-xs">
                    <fingerprint-spinner
                        :animation-duration="1500"
                        :size="20"
                        class="text-white"
                        v-if="loading"
                    />
                    <template v-else>
                        Kết bạn
                        <icon name="user-plus" class="w-4 h-4 fill-current ml-1"></icon>
                    </template>
                </blue-button>
            </form>
        </template>
    </div>
</template>
<script>
import Accept from './Accept.vue'
import BlueButton from '@/Components/Buttons/BlueButton.vue'
import Ignore from './Ignore.vue'
import JetDangerButton from '@/Jetstream/DangerButton.vue'
export default {
    props:['profile','isFriendsWith', 'friendRequestSentTo', 'friendRequestRecievedFrom'],
    components:{
        BlueButton,
        Accept,
        Ignore,
        JetDangerButton,
    },
    data(){
        return{
            addFriendForm: this.$inertia.form({
                    user: this.profile
                }),
            deleteFriendForm: this.$inertia.form({
                    user: this.profile
                }),
        }

    },
    methods: {
        addFriend(){
            this.addFriendForm.post(this.route('friends.store', this.profile.id),{
                preserveScroll : true,
                onSuccess:()=>{},
        })
        },
        deleteFriend(){
            this.deleteFriendForm.delete(this.route('friends.destroy', this.profile.id),{
                preserveScroll : true,
                onSuccess:()=>{},
        })
        },
    }
}
</script>