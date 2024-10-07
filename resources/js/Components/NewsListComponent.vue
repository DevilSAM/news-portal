<template>
  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
        <h1 v-if="useHeadTitle" class="dark:text-gray-100 text-2xl font-bold text-center mt-6 mb-6">Новости</h1>
        <div v-if="useSearch" class="flex items-center justify-end">
          <div>
            <TextInput
                id="search"
                type="text"
                class="my-6 block w-full"
                v-model="form.search"
                required
                autofocus
                autocomplete="username"
            />
          </div>
          <PrimaryButton @click="submit" class="ms-4 my-6 me-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Поиск
          </PrimaryButton>
        </div>
        <Link v-for="n in news.data" :key="n.id" :href="route('news')+'/'+n.id" as="button" class="w-[100%] text-left" :disabled="linksDisabled">
          <div class="ease-in-out duration-300 mt-[5px] mb-[5px] border-indigo-400 hover:border-x-4 hover:border-x-custom-red hover:mt-1 hover:mb-1 border-2 news-card p-6 text-gray-900 dark:text-gray-100">
            {{ n?.title }}
          </div>
        </Link>
      </div>

      <Paginator class="mt-4" :news-url-route-name="newsUrlRouteName" :current-page="news.current_page" :total-items="news.total" :items-per-page="news.per_page"/>

    </div>
  </div>
</template>


<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Paginator from "@/Components/Paginator.vue";

const props = defineProps({
  news: {
    type: Object,
  },
  useSearch: {
    type: Boolean,
    default: true,
  },
  useHeadTitle: {
    type: Boolean,
    default: true,
  },
  newsUrlRouteName: {
    type: String,
    default: 'news',
  },
  linksDisabled: {
    type: Boolean,
    default: false
  },
})
const form = useForm({
  search: '',
});
const submit = () => {
  form.get(route('news'), {
    'search': form.search
  });
};
</script>
<style scoped>
.news-card {
  border-style: solid;
  border-radius: 5px;
}
</style>
