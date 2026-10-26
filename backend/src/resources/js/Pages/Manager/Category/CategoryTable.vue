<script>
export default {
    name: 'CategoryTable',
}
</script>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    data: {
        type: Object,
        required: true,
    }
});

const emit = defineEmits({
    getAction: {
        type: Object,
        required: true,
    }
});

const headers = computed(() =>
    props.data.length > 0 ? Object.keys(props.data[0]) : []
);

const emitAction = (idElement, actionElement) => {
    const actions = ['show', 'edit', 'delete'];
    const actionObject = {
        'action': actions[actionElement],
        'id': idElement,
    };

    emit('getAction', actionObject);
}

</script>

<template>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base p-3">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-base text-body bg-neutral-secondary-medium border-b border-default-medium bg-stone-300">
                <tr class="" v-if="headers.length">
                    <th class="px-6 py-3" v-for="key in headers">{{ key }}</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
                <tr v-else>
                    <th colspan="100%" class="px-6 py-3 text-center">
                        There are no items
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="Object.keys(data).length !== 0" class="bg-neutral-primary-soft border-b  border-default hover:bg-gray-200" v-for="row in data">
                    <td class="text-sm cursor-pointer" v-on:click="emitAction(row.id, 0)" v-for="value in row">{{ value }}</td>
                    <td class="flex gap-2">
                        <button v-on:click="emitAction(row.id, 1)" class="bg-green-500 p-2 rounded-lg inline-block">Edit</button>
                        <button v-on:click="emitAction(row.id, 2)" class="bg-red-500 p-2 rounded-lg inline-block">Delete</button>
                    </td>
                </tr>
                <tr v-else>
                    <td colspan="100%" class="px-6 py-3 text-center">
                        There are no items
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>