<template>
    <jet-authentication-card>
        <template #logo>
            <Link :href="route('welcome')">
                <img src="../images/logo1.png" alt="Logo" class="w-48">
            </Link>
        </template>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="name" value="Tên" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                    autocomplete="name" />
            </div>

            <div class="mt-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Mật khẩu" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Xác nhận mật khẩu" />
                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full"
                    v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

    
            
            <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox name="terms" id="terms" v-model="form.terms" />

                        <div class="ml-2">
                            Tôi đồng ý <a target="_blank" :href="route('terms.show')"
                                class=" text-sm text-gray-600 hover:text-gray-900">Điều khoản dịch vụ</a> và <a
                                target="_blank" :href="route('policy.show')"
                                class=" text-sm text-gray-600 hover:text-gray-900">Chính sách bảo mật</a>
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class=" text-sm text-gray-600 hover:text-gray-900">
                    Đã có tài khoản?
                </Link>

                <jet-button class="ml-4 " :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    ĐĂNG KÝ
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from '@/Jetstream/Label.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

export default {
    components: {
        JetAuthenticationCard,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
        Head,
        Link

    },

    data() {
        return {
            form: this.$inertia.form({
                name: '',
                gender: '',
                email: '',
                password: '',
                password_confirmation: '',
                terms: false,
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            })
        }
    }
}
</script>
