<template>
    <Head>
        <Title>
            Home
        </Title>
    </Head>

    <ControlPanelLayout>
        <NewsListComponent
            :news="news"
            :use-search="false"
            news-url-route-name="control-panel.news"
            :links-disabled="true"
            :use-head-title="true" />
    </ControlPanelLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import ControlPanelLayout from "@/Layouts/ControlPanelLayout.vue";
import NewsListComponent from "@/Components/NewsListComponent.vue";

const props = defineProps({
  news: {
    type: Object,
  },
})
</script>
