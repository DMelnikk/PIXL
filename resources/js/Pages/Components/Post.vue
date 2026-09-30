<script setup>
    import LikeButton from "@/Pages/Components/LikeButton.vue";
    import ReplyButton from "@/Pages/Components/ReplyButton.vue";
    import RepostButton from "@/Pages/Components/RepostButton.vue";
    import SaveButton from "@/Pages/Components/SaveButton.vue";
    import ShareButton from "@/Pages/Components/ShareButton.vue";
    import Reply from "@/Pages/Components/Reply.vue";

    defineProps({
        post: Object,
        showEngagement: {type: Boolean, default: true},
        showReplies: {type: Boolean, default: false},
    })
</script>

<template>
    <li class="flex items-start gap-4 not-first:pt-2.5">
        <a href="{{route('profile.show',$post->profile)}}" class="shrink-0">
            <img :src="post.profile.avatar_url" :alt="`Avatar for ${post.profile.display_name}`" class="size-10 object-cover">
        </a>
        <div class="grow pt-1.5">
            <div class="border-b border-pixl-light/10 pb-5">
                <!-- User meta -->
                <div class="flex justify-between items-center gap-4">
                    <div class="flex gap-2.5 items-center">
                        <p><a class="hover:underline" href="{{route('profile.show',$post->profile)}}">post.profile.display_name}}</a></p>
                        <p class="text-xs text-pixl-light/40"><a href="{{route('posts.show',[$post->profile, $post])}}">post.created_at</a></p>
                        <p>
                            <a class="hover:text-pixl-light/60 text-xs text-pixl-light/40" href="/{{$post->profile->handle}}">post.profile.handle</a>
                        </p>
                    </div>
                    <button class="flex gap-[3px] group py-2" aria-label="Post options">
                        <span class="size-1 bg-pixl-light/40 group-hover:bg-pixl-light/60"></span>
                        <span class="size-1 bg-pixl-light/40 group-hover:bg-pixl-light/60"></span>
                        <span class="size-1 bg-pixl-light/40 group-hover:bg-pixl-light/60"></span>
                    </button>
                </div>
                <!-- Post content -->
                <div class="mt-4 text-sm flex flex-col gap-3 [&_a]:text-pixl [&_a]:hover:underline">
                    <div v-html="post.content"></div>


                    <ul v-if="!!post.repost_of_id && !!post.content">
                        <Post :post="post.repost_of" :show-engagement="false" />
                    </ul>

                </div>


                <!-- Action buttons -->
                <div v-if="showEngagement" class="mt-6 flex justify-between items-center gap-4">
                    <div class="flex items-center gap-8">

                        <!-- Like -->
                        <LikeButton :active="post.has_liked" :count="post.likes_count" :id="post.id"/>
                        <!-- Comment -->
                        <ReplyButton :count="post.replies_count" :id="post.id" />
                        <!-- Re-post -->
                        <RepostButton :active="post.has_reposted" :count="post.reposts_count" :id="post.id" />

                    </div>
                    <div class="flex items-center gap-3">
                        <!-- Save -->
                        <SaveButton :id="post.id" />
                        <!-- Share  -->
                        <ShareButton :id="post.id" />

                    </div>
                </div>


<!--                <x-reply-form :post="post" />-->

            </div>


            <!-- Threaded replies -->
            <ol v-if="showReplies">
                <Reply v-for="reply in post.replies" :key="post.id" :post="reply" :show-engagement="showEngagement"
                       :show-replies="showReplies" />
            </ol>
        </div>
    </li>


</template>

<style scoped>

</style>
