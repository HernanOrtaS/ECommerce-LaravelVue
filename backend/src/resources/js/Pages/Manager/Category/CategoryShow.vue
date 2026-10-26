<script>
export default {
    name: 'CategoryShow',
}
</script>

<script setup>
import { defineProps } from 'vue';

import SecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
    showing: {
        type: Object,
        required: true,
    },
})

const emit = defineEmits(['closeModal']);

const closeModal = () => {
    emit('closeModal');
}

</script>

<template>
<div class="p-8 flex flex-col gap-7 items-center">
    <div class="">
        <h2 class="font-bold text-2xl flex gap-2 text-stone-700">
            This is the category:
            <p class="text-stone-900">
                {{ props.showing.name }}
            </p>
        </h2>
    </div>
    <div class="w-fit flex flex-col">
        <div v-for="(value, key) in props.showing" class="flex gap-5 w-fit">
            <div class="w-24">
                <p class="text-lg font-bold">{{ key }}:</p>
            </div>
            <div class="flex items-end">
                <p class="">{{ value }}</p>
            </div>
        </div>
    </div>
    <div class="">
        <SecondaryButton v-on:click="closeModal" class="py-3 px-8">Ok</SecondaryButton>
    </div>
</div>
</template>
