<script>
export default {
    name: 'CategoryForm',
}
</script>

<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, onMounted } from 'vue';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import InputError from '@/Components/InputError.vue';


const page = usePage();
const userId = computed(() => page.props.auth.user.id)
const errors = computed(() => page.props.errors)

const props = defineProps({
    updating: {
        type: Boolean,
        required: false,
    },
    editingObject: {
        type: Object,
        required: false,
    }
});

const form = useForm({
    'name': '',
    'description': '',
    'user_id': userId.value,
});

const emit = defineEmits(['closeModal']);

const closeModal = () => {
    form.reset(['name', 'description']);
    emit('closeModal');
}

const submit = () => {
    if (props.updating) {
        form.put(
            route('category.update', props.editingObject.id),
            submitOptions
        )
    } else {
        form.post(
            route('category.store'),
            submitOptions
        )
    }
}

const submitOptions = {
    onSuccess: () => {
        closeModal();
    }
}

onMounted(() => {
    if(props.updating) {
        form.name = props.editingObject.name;
        form.description = props.editingObject.description;
    }
})

</script>

<template>
    <div class="p-8">
        <div class="mb-6">
            <h2 class="text-center font-bold text-2xl">
                {{ updating ? 'Edit the category' : 'Create a new Category' }}
            </h2>
        </div>
        <form v-on:submit.prevent="submit">
            <div class="grid gap-4">
                <div>
                    <div class="flex gap-3">
                        <label class="content-center" for="name">Name of the category</label>
                        <input v-model="form.name" id="name" name="name" class="flex-1" type="text">
                    </div>
                    <InputError class="text-end m-2 mb-0" v-bind:message="errors.name" />
                </div>
                
                <div>
                    <div class="flex gap-3">
                        <label class="content-center" for="description">Description of the category</label>
                        <input v-model="form.description" id="description" name="description" class="flex-1" type="text">
                    </div>
                    <InputError class="text-end m-2 mb-0" v-bind:message="errors.description" />
                </div>
                <div class="flex place-content-end gap-3">
                    <PrimaryButton :disabled="form.processing">{{ updating ? 'Edit' : 'Submit' }}</PrimaryButton>
                    <SecondaryButton type="button" v-on:click="closeModal">Cancel</SecondaryButton>
                </div>
            </div>
        </form>
    </div>
</template>