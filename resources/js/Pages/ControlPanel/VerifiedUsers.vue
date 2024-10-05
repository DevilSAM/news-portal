<template>
    <Head title="Home" />
    <ControlPanelLayout>
        <UsersListComponent title="Зарегистрированные пользователи" :users="verifiedUsers" />
    </ControlPanelLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import ControlPanelLayout from "@/Layouts/ControlPanelLayout.vue";
import UsersListComponent from "@/Components/UsersListComponent.vue";

const props = defineProps({
  verifiedUsers: {
    type: Array,
  },
})
</script>
