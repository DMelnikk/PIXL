<script setup>
import {ref, watch} from "vue";
import {usePage} from "@inertiajs/vue3";

    let flashMessage = ref(false);

    function flash(message) {
        flashMessage.value = message;

        setTimeout(() => flashMessage.value = false,3000);
    }

    watch(() => usePage().props.flash.success, flash)
</script>

<template>

    <Transition
    enter-active-class="transition duration-300 transform ease-out"
    enter-from-class="translate-x-full opacity-0"
    enter-to-class="opacity-100"
    leave-active-class="transition duration-200 transform ease-out"
    leave-to-class="translate-x-full opacity-0">
        <div v-if="flashMessage" class="fixed bottom-4 right-4 bg-pixl text-white rounded-md py-2 px-3" v-text="flashMessage" />
    </Transition>
</template>


