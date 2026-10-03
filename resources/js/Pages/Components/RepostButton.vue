<script setup>
import RepostIcon from "@/Pages/Components/Icon/RepostIcon.vue";
import {Form} from "@inertiajs/vue3";

defineProps({
    post: Object,
})
</script>

<template>
    <Form method="POST" :action="route('posts.repost', [post.profile, post])">
        <div class="flex items-center gap-1">
            <button aria-label="Re-post"  :class="post.has_reposted ? 'hover:text-pixl text-pixl' : '' ">
                <RepostIcon />
            </button>

            <span :class="post.has_reposted ? 'hover:text-pixl text-pixl' : '' " class="text-xs">{{post.reposts_count}}</span>
        </div>
    </Form>


</template>

<style scoped>

</style>
