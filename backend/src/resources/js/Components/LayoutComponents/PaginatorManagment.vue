<script>
export default {
    name: 'PaginatorManagment'
}
</script>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    paginatorElements: {
        type: Object,
        required: true,
    }
});

const classes = ref(
    "inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
);

</script>

<template>
    <div v-if="paginatorElements" class="flex gap-3 items-center">
        <div v-if="paginatorElements.prev_page_url"><Link :href="paginatorElements.prev_page_url" :class="classes" >Prev Page</Link></div>
        <div>{{ paginatorElements.current_page }}</div>
        <div v-if="paginatorElements.next_page_url"><Link :href="paginatorElements.next_page_url" :class="classes">Next Page</Link></div>
    </div>
</template>