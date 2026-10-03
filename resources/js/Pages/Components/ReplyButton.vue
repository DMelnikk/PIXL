<script setup>
import ReplyIcon from "@/Pages/Components/Icon/ReplyIcon.vue";

defineProps({
    count: {type: Number, default: 0},
})
</script>

<template>
    <div class="flex items-center gap-1">
        <button aria-label="Comment" class="hover:text-pixl">
            <ReplyIcon />
        </button>
        <span class="text-xs">{{count}}</span>
    </div>

</template>

<style scoped>

</style>
