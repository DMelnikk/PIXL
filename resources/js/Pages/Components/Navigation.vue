<script setup>

import Logo from "@/Pages/Components/Icon/Logo.vue";
import {Link} from "@inertiajs/vue3";
</script>

<template>
      <header class="w-48 hidden shrink-0 my-4 pl-4 xl:ml-40 sm:flex flex-col gap-8 justify-between">
          <div class="overflow-y-auto  pl-4">
              <!-- Logo -->
              <a href="/">
                 <Logo />
              </a>
              <!-- Navigation -->
              <nav class="mt-10">
                  <ul class="flex flex-col gap-3.5">
                      <li><a class="hover:underline" :class="{'text-pixl': $page.component === 'Posts/Index'}" :href="route('posts.index')">Home</a></li>
                      <li><a class="hover:underline" href="#">Explore</a></li>
                      <!-- Active item -->
                      <li class="-ml-4 flex gap-2 items-center">
                          <div class="size-2 bg-pixl shrink-0"></div>
                          <a class="hover:underline" href="#">Notifications</a>
                      </li>
                      <li><a class="hover:underline" href="#">Lists</a></li>
                      <li><a class="hover:underline" href="#">Bookmarks</a></li>
                      <li><a class="hover:underline" href="#">Jobs</a></li>
                      <li><a class="hover:underline" href="#">Communities</a></li>
                      <li><a class="hover:underline" href="#">Premium</a></li>
                      <li><a class="hover:underline" href="#">Profile</a></li>
                      <li><a class="hover:underline" href="#">More</a></li>
                  </ul>
              </nav>

          </div>


                <!-- TODO: THIS SHOULD ONLY WHEN WE ARE NOT ON POSTS.INDEX ROUTE -->
                 <div class="flex flex-col gap-6">
                      <Link
                          v-show="$page.component !== 'Posts/Index'"
                          :href="route('posts.index')"
                        class="bg-pixl hover:bg-pixl/90 border active:bg-pixl/95 border-transparent px-4 py-3 text-pixl-dark text-sm text-center">
                         Post
                    </Link>





          <!-- User controls -->
          <div class="flex gap-3.5">
              <a href="/profile" class="shrink-0">
                  <img :src="$page.props.auth.user.profile.avatar_url" :alt="`Avatar for ${$page.props.auth.user.profile.display_name}`" class="size-11 object-cover">
              </a>
              <div class="flex flex-col gap-1 text-sm">
                  <p>{{$page.props.auth.user.profile.display_name}}</p>
                  <p class="text-pixl-light/60">{{$page.props.auth.user.profile.handle}}</p>
              </div>
              <button class="flex gap-[3px] group py-2" aria-label="Post options">
                  <span class="size-1 bg-pixl-light/40 group-hover:bg-pixl-light/60"></span>
                  <span class="size-1 bg-pixl-light/40 group-hover:bg-pixl-light/60"></span>
                  <span class="size-1 bg-pixl-light/40 group-hover:bg-pixl-light/60"></span>
              </button>
          </div>
                  </div>
      </header>
</template>

<style scoped>

</style>
