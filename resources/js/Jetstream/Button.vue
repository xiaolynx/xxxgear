<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-violet-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-violet-600 active:bg-gray-900 focus:outline-none focus:border-violet-500 focus:shadow-outline-gray transition ease-in-out duration-150">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    }
</script>
