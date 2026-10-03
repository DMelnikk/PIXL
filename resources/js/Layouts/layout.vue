<script setup>
import Navigation from "../Pages/Components/Navigation.vue";
import Aside from "../Pages/Components/Aside.vue";
import FlashMessages from "@/Pages/Components/FlashMessages.vue";
</script>
<template>
    <div class="bg-pixl-dark text-pixl-light flex gap-8 xl:gap-16 px-4 sm:h-dvh sm:overflow-clip">
        <Navigation />

        <slot />

        <Aside />

        <FlashMessages />
    </div>
</template>
