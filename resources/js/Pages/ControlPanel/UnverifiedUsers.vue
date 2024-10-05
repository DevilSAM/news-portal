<template>
    <Head title="Home" />

    <ControlPanelLayout>
        <UsersListComponent title="Пользователи, ожидающие подтверждения" :users="unverifiedUsers" :show-code="true" />
    </ControlPanelLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import ControlPanelLayout from "@/Layouts/ControlPanelLayout.vue";
import UsersListComponent from "@/Components/UsersListComponent.vue";

const props = defineProps({
  unverifiedUsers: {
    type: Array,
  },
})
</script>
