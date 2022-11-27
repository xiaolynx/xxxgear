<script >
    import PagesLayout from '@/Layouts/PagesLayout.vue';
    import CombinedPosts from '../Components/PostComment/CombinedPosts.vue';
    import JetInputError from '@/Jetstream/InputError.vue'
    import BlueButton from '../Components/Buttons/BlueButton.vue'
    import PostForm from '../Components/PostComment/PostForm.vue'
    export default{
        props:['combinedPosts'],
        components:{
            PagesLayout,
            CombinedPosts,  
            JetInputError,
            BlueButton,
            PostForm,
        },
        data(){
            return{
                form: this.$inertia.form({
                    user_id: this.$page.props.id,
                    body:this.body,
                })
            }
        },
        methods:{
            submit(){
                this.form.post(this.route('posts.store'),{
                    preserveScroll : true,
                    onSucess:()=>{

                    }
                })
            }
        }
    }
</script>

<template>
    <pages-layout>
        <template #title>
            <div class="flex justify-between items-center w-full">
                <h2 class="flex items-end font-semibold text-xl text-gray-800 leading-tight">
                    <img src="../Pages/images/logo1.png" :alt="logo-gear" class="h-8 w-8 rounded-full object-cover">
                    <span class="capitalize ml-3 h-7 w-24" >Trang chủ</span>
                </h2>
            </div>
        </template>
        
        <post-form :method="submit" :form="form" :text="'Post'"></post-form>

        <combined-posts :posts="combinedPosts.data"></combined-posts>
    </pages-layout>
</template>
