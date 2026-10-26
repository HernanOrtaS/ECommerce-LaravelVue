<script>
export default {
    name: 'CategoryDelete',
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { onMounted, defineProps } from 'vue';

import SecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
    deleting: {
        type: Object,
        required: true,
    },
})

const emit = defineEmits(['closeModal']);

const closeModal = () => {
    emit('closeModal');
}

const deleting = useForm({
    id: '',
})

const deleteElement = () => {
    deleting.delete(route('category.delete', props.deleting.id));
    closeModal();
}

onMounted(() => {
    deleting.id = props.deleting.id;
})

</script>

<template>
    <div class="p-8">
        <div class="mb-6">
            <h2 class="text-center font-bold text-2xl">
                You are about to delete {{ props.deleting.name }}
            </h2>
        </div>
        <div>
            <p>You are about to delete "{{ props.deleting.name }}"</p>
            <p>With the description "{{ props.deleting.description }}"</p>
        </div>
        <div class="flex place-content-end gap-3">
            <button v-on:click="deleteElement" class="bg-red-500 hover:bg-red-400 py-2 px-4 rounded-lg inline-block text-white font-bold">Delete</button>
            <SecondaryButton v-on:click="closeModal">Cancel</SecondaryButton>
        </div>
    </div>
</template>