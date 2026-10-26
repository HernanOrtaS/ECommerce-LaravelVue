<script>
export default {
    name: 'Managment',
}
</script>

<script setup>
import Dropdown from '../Dropdown.vue';
import DropdownLink from '../DropdownLink.vue';
import UserPlus from '@primeicons/vue/user-plus';
</script>

<template>
    <div class="ms-3 relative self-center">
        <Dropdown align="right" width="48" class="h-full">
            <template #trigger>
                <span class="inline-flex rounded-md h-full">
                    <button type="button" class="inline-flex items-center h-full px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                        Managment

                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </span>
            </template>

            <template #content>
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    <UserPlus class="inline" />
                        Admin Managment
                </div>

                <DropdownLink :href="route('category.index')" :active="route().current('category.*')">
                    <p>Manage Category</p>
                </DropdownLink>

            </template>
        </Dropdown>
    </div>
</template>