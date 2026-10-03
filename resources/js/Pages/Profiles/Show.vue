<script setup>

import Layout from "@/Layouts/layout.vue";
import Post from "@/Pages/Components/Post.vue";
import ProfileHeader from "../../Pages/Components/ProfileHeader.vue";
import BackIcon from "@/Pages/Components/Icon/BackIcon.vue";
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
                <!-- Profile Header -->
                <nav class="overflow-x-auto sm:overflow-x-visible scrollbar:none">
                    <ul class="flex min-w-max justify-end gap-8 text-sm">
                        <li><a href="#">For you</a></li>
                        <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Idea streams</a></li>
                        <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Following</a></li>
                    </ul>
                </nav>

                <a :href="route('posts.index')" class="flex items-baseline gap-1.5 group">
                    <BackIcon />
                    <span class="group-hover:underline">back</span>
                </a>


                <!-- Heder profile -->
                <ProfileHeader :profile="profile" />


                <!-- Feed -->
                <ol class="pt-4 border-pixl-light/10 border-t">
                    <Post
                        v-for="item in posts" :post="item"
                        :show-engagement="true"
                    />
                </ol>

               <AppFooter />
            </main>
        </Layout>
</template>
