<script setup>
import Layout from "../../Layouts/layout.vue";
import PostForm from "@/Pages/Components/PostForm.vue";
import Post from "@/Pages/Components/Post.vue";
import AppFooter from "@/Pages/Components/AppFooter.vue";

defineProps({
    profile: Object,
    posts: Array,
});
</script>


<template>
    <Layout>
        <!-- Content -->
        <main class="flex flex-col grow gap-4 overflow-y-auto py-4 px-4 -mx-4">
            <nav class="overflow-x-auto sm:overflow-x-visible scrollbar:none">
                <ul class="flex min-w-max justify-end gap-8 text-sm">
                    <li><a href="#">For you</a></li>
                    <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Idea streams</a></li>
                    <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Following</a></li>
                </ul>
            </nav>

            <!-- Post prompt -->
            <PostForm :profile="profile" />

            <!-- Feed -->
            <ol class="mt-4">
                <!-- Feed item -->
                <Post v-for="item in posts" :key="item.id" :post="item"/>
            </ol>


            <AppFooter />
        </main>

    </Layout>
</template>
