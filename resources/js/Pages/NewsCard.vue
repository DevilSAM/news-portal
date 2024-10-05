<template>
    <Head title="Home" />

    <BasicLayout>
        <div class="py-12">
          <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <img :src="news.image_url ?? noImage" alt="news image" class="news-image">
                <h1 class="text-2xl font-bold text-center mt-6 mb-6">{{ news.title }}</h1>
                <p class="mt-6 mb-6">{{ news.content }}</p>
                <a :href="news.source" target="_blank" class="text-custom-red underline">Источник</a>
                <p class="mt-6 mb-6">{{ news.published_at }}</p>
              </div>
            </div>
          </div>
        </div>
    </BasicLayout>
</template>
<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head } from '@inertiajs/vue3';
import noImage from '/resources/images/no-image.webp'

defineProps({
  news: {
    type: Object,
  },
})
</script>

<style scoped>
.news-image {
  width: 50%;
  margin-left: auto;
  margin-right: auto;
}
</style>
