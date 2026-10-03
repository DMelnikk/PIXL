<script setup>
import {Form} from "@inertiajs/vue3";
import ImageIcon from "@/Pages/Components/Icon/ImageIcon.vue";
import VideoIcon from "@/Pages/Components/Icon/VideoIcon.vue";

defineProps({
    profile: Object,
    post: Object,
});

let emit = defineEmits(['success'])
</script>

<template>
    <!-- Reply form -->
    <div class="flex mt-8 items-start gap-4 border-t bg-pixl-light/[3%] border-pixl-light/10 p-4">
        <a :href="route('profile.show',profile)" class="shrink-0">
            <img :src="profile.avatar_url" :alt="`Avatar for ${profile.display_name}`" class="size-10 object-cover">
        </a>

        <Form
            class="grow"
            method="POST"
            :action="route('posts.reply', [post.profile, post])"
            reset-on-success
            #default="{errors}"
            @success="emit('success')"
        >
            <label class="sr-only" for="content">Reply body</label>
            <textarea
                class="text-lg w-full resize-none"
                name="content"
                id="content"
                :placeholder="`Reply to ${post.profile.display_name}'s post`"
                rows="5"
            ></textarea>
            <div v-if="errors.content" v-text="errors.content" class="text-red-500 mb-2 text-sm"/>
            <div class="flex justify-between gap-4 items-center">
                <div class="flex gap-4">
                    <button type="button">
                        <ImageIcon />
                    </button>
                    <button type="button">
                        <VideoIcon />
                    </button>
                </div>
                <button type="submit"
                        class="bg-pixl hover:bg-pixl/90 border active:bg-pixl/95 border-transparent px-4 py-1 text-pixl-dark text-sm">
                    Post
                </button>
            </div>
        </Form>
    </div>

</template>

<style scoped>

</style>
