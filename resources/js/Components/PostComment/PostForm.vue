<template>
    <form @submit.prevent="method" class="w-full">
        <div>
            <textarea name="post" rows="3" class="border rounded px-2 py-2 w-full" :placeholder="`Bạn đang nghĩ gì ${$page.props.user.name} ...`" v-model="form.body"></textarea>
        </div>
        <div class="flex justify-between my-3">
            <div>
                <jet-input-error :message="form.errors.body" class="mt-2" v-if="form.errors.body"></jet-input-error>
            </div>
            <div>
                <blue-button type="submit" class="text-xs" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    <Preloader color="red" scale="0.6" 
                        v-if="form.processing"
                    />
                    <span v-else>{{ text }}</span>
                </blue-button>
            </div>
        </div>
    </form>
</template>

<script>
    import Preloader from '@/Components/Preloader.vue'
    import BlueButton from '@/Components/Buttons/BlueButton.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    export default {
        props: ['method', 'form', 'text'],
        components: {
            BlueButton,
            Preloader,
            JetInputError,
        },
        
    }
</script>
