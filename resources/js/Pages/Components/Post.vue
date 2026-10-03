<script setup>
    import LikeButton from "@/Pages/Components/LikeButton.vue";
    import ReplyButton from "@/Pages/Components/ReplyButton.vue";
    import RepostButton from "@/Pages/Components/RepostButton.vue";
    import SaveButton from "@/Pages/Components/SaveButton.vue";
    import ShareButton from "@/Pages/Components/ShareButton.vue";
    import Reply from "@/Pages/Components/Reply.vue";
    import ReplyForm from "@/Pages/Components/ReplyForm.vue";
    import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
    import {ref} from "vue";
    import {Link} from "@inertiajs/vue3";

    defineProps({
        post: Object,
        showEngagement: {type: Boolean, default: true},
        showReplies: {type: Boolean, default: false},
    })

    let showReplyForm = ref(false);
</script>

<template>
    <li class="flex items-start gap-4 not-first:pt-2.5" data-test="post-feed-item">
        <a :href="route('profile.show',post.profile)" class="shrink-0">
            <img :src="post.profile.avatar_url" :alt="`Avatar for ${post.profile.display_name}`" class="size-10 object-cover">
        </a>
        <div class="grow pt-1.5">
            <div class="border-b border-pixl-light/10 pb-5">
                <!-- User meta -->
                <div class="flex justify-between items-center gap-4">
                    <div class="flex gap-2.5 items-center">
                        <p><a class="hover:underline" :href="route('profile.show',post.profile)">{{post.profile.display_name}}</a></p>
                        <p class="text-xs text-pixl-light/40"> <a :href="route('posts.show', [post.profile, post])" data-test="visit-post-link">{{ post.created_at }}</a></p>
                        <p>
                            <a class="hover:text-pixl-light/60 text-xs text-pixl-light/40" href="/{{post.profile.handle}}">{{post.profile.handle}}</a>
                        </p>
                    </div>


                    <Menu as="div" class="relative inline-block">
                        <MenuButton
                            class="group flex gap-[3px] py-2 w-full justify-center rounded-md px-3 text-sm font-semibold text-white inset-ring-1 inset-ring-white/5">
                            <span class="bg-pixl-light/40 group-hover:bg-pixl-light/60 size-1"></span>
                            <span class="bg-pixl-light/40 group-hover:bg-pixl-light/60 size-1"></span>
                            <span class="bg-pixl-light/40 group-hover:bg-pixl-light/60 size-1"></span>
                        </MenuButton>

                        <transition enter-active-class="transition ease-out duration-100"
                                    enter-from-class="transform opacity-0 scale-95" enter-to-class="transform scale-100"
                                    leave-active-class="transition ease-in duration-75" leave-from-class="transform scale-100"
                                    leave-to-class="transform opacity-0 scale-95">
                            <MenuItems
                                class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-pixl-dark outline-1 -outline-offset-1 outline-white/10">
                                <div class="py-1">
                                    <MenuItem v-slot="{ active }">
                                        <Link :href="route('posts.show', [post.profile, post])"
                                              class="block px-4 py-2 text-sm">View Post</Link>
                                    </MenuItem>

                                    <!--  -->
                                    <MenuItem v-slot="{ active }"  v-if="post.can.update" >
                                        <Link :href="route('posts.destroy', [post.profile, post])" method="post" as="button"
                                              class="block px-4 py-2 text-sm">Delete</Link>
                                    </MenuItem>
                                </div>
                            </MenuItems>
                        </transition>

                    </Menu>
                </div>
                <!-- Post content -->
                <div class="mt-4 text-sm flex flex-col gap-3 [&_a]:text-pixl [&_a]:hover:underline">
                    <div v-html="post.content"></div>

                    <ul v-if="!!post.repost_of">
                        <Post :post="post.repost_of" :show-engagement="false" />
                    </ul>

                </div>


                <!-- Action buttons -->
                <div v-if="showEngagement" class="mt-6 flex justify-between items-center gap-4">
                    <div class="flex items-center gap-8">

                        <!-- Like -->
                        <LikeButton :post="post"/>
                        <!-- Comment -->
                        <ReplyButton :count="post.replies_count" :id="post.id" @click="showReplyForm = true" />
                        <!-- Re-post -->
                        <RepostButton :post="post"/>

                    </div>
                    <div class="flex items-center gap-3">
                        <!-- Save -->
                        <SaveButton :id="post.id" />
                        <!-- Share  -->
                        <ShareButton :id="post.id" />
                    </div>
                </div>


                <ReplyForm v-show="showReplyForm"  :post="post" :profile="$page.props.auth.user.profile" @success="showReplyForm = false"/>

            </div>


            <!-- Threaded replies -->
            <ol v-if="showReplies">
                <Reply v-for="reply in post.replies" :key="reply.id" :post="reply" :show-engagement="showEngagement"
                       :show-replies="showReplies" />
            </ol>
        </div>
    </li>


</template>

<style scoped>

</style>
