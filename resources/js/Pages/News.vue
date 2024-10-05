<template>
    <Head title="Home" />

    <BasicLayout>
        <NewsListComponent :news="news" :use-head-title="false" />
    </BasicLayout>
</template>

<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head } from '@inertiajs/vue3';
import NewsListComponent from "@/Components/NewsListComponent.vue";

const props = defineProps({
  news: {
    type: Object,
  },
})
</script>
