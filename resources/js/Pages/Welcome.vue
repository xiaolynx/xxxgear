<template>
    <div class="flex justify-around items-center bg-zinc-50 min-h-screen ">
        <div class="w-1/2">
            <img src="../Pages/images/GEAR.png" alt="logo-gear" >
        </div>
        <div class="text-center rounded-lg border-purple-500 p-32 " >
            <h1 class="text-7xl font-semibold pb-2 text-violet-500">
                ⚙GEAR⚙
            </h1>
            <div v-if="canLogin" class="flex justify-center space-x-6 mt-5  ">
                <Link href="#" v-if="$page.props.user" class="text-lg text-gray-700 underline">
                    Dashboard
                </Link>
                <template v-else>
                    <Link :href="route('login')"
                        class="text-white bg-violet-500 rounded px-8 py-3 hover:bg-violet-900">ĐĂNG NHẬP</Link>
                    <Link :href="route('register')" v-if="canRegister"
                        class="text-white bg-violet-500 rounded px-8 py-3 hover:bg-violet-900">
                        ĐĂNG KÝ
                    </Link>
                </template>
            </div>
            <p class="mt-10">Đã có {{ users }} thành viên tham gia</p>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
export default {
    components: {
            Head,
            Link,
        },
    props: {
        users: Number,
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    }
}
</script>
