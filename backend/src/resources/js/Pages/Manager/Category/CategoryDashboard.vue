<script setup>
import { computed, ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Modal from '@/Components/Modal.vue';
import { usePage } from '@inertiajs/vue3';

import CategoryTable from './CategoryTable.vue';
import CategoryForm from './CategoryForm.vue';
import CategoryDelete from './CategoryDelete.vue';
import CategoryShow from './CategoryShow.vue';
import PaginatorManagment from '@/Components/LayoutComponents/PaginatorManagment.vue';

defineProps({
    categories: {
        type: Object,
        required: true,
    }
})

const modal = ref(false); // Open - Close
const actionModal = ref(null); // What is the operation of the modal
const objectFound = ref(null); // Object to edit
const updating = ref(false); // Call to the form the value of updating

const toggleModal = () => {
    modal.value = !modal.value;
}

const getObject = async(id) => {
    const category = await fetch(route('category.edit', id));
    const response = await category.json();
    
    return response;
}

const chooseAction = async (action) => {
    objectFound.value = await getObject(action.id);
    switch (action.action) {
        case 'show':
            actionModal.value = 'show';
            break;
        
        case 'edit':
            updating.value = true;
            actionModal.value = 'edit';
            break;

        case 'delete':
            actionModal.value = 'delete';
            break;
    
        default:
            console.log('no option')
            break;
    }
    toggleModal();
}

const startCreate = () => {
    actionModal.value = 'create';
    updating.value = false;
    objectFound.value = null;

    toggleModal();
}
const page = usePage();

const pageProps = computed(() => page.props.categories);

const paginatorElements = {
    'prev_page_url': pageProps.value.prev_page_url,
    'next_page_url': pageProps.value.next_page_url,
    'current_page': pageProps.value.current_page,
}

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Category Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex items-center p-2">
                        <div class="flex-1">
                            <div>
                                <input type="text" placeholder="Type to search">
                            </div>
                        </div>
                        <div class=" mx-2">
                            <button v-on:click="startCreate" class="bg-green-400 hover:bg-green-500 p-2 rounded-lg">Create</button>
                        </div>
                    </div>
                    <div>
                        <CategoryTable :data="categories.data" v-on:get-action="chooseAction" />
                    </div>
                </div>
                <div class="flex place-content-end m-3">
                    <PaginatorManagment :paginator-elements="paginatorElements" />
                </div>
            </div>
        </div>
        <div>
            <Modal :show="modal" v-on:close="toggleModal">
                <CategoryForm v-if="actionModal=='edit' || actionModal=='create'" v-on:close-modal="toggleModal" v-bind:editingObject="objectFound" v-bind:updating="updating" />
                <div v-if="actionModal=='delete'">
                    <CategoryDelete v-bind:deleting="objectFound" v-on:close-modal="toggleModal"/>
                </div>
                <div v-if="actionModal=='show'">
                    <CategoryShow v-bind:showing="objectFound" v-on:close-modal="toggleModal"/>
                </div>
            </Modal>
        </div>
    </AppLayout>
</template>
