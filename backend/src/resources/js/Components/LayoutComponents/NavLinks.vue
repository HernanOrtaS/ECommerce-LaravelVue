<script>
export default {
    name: 'NavLinks',
}
</script>

<script setup>
import NavLink from '../NavLink.vue';
import Managment from './Managment.vue';
</script>

<template>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
            Dashboard
        </NavLink>
        <Managment />
    </div>
</template>