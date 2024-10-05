<template>
    <Head title="Home" />

    <ControlPanelLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex flex-row">
                    <div v-if="verifiedUsers" class="me-2 basis-1/2 overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                        <h1 class="dark:text-gray-100 text-2xl font-bold text-center mt-6 mb-6">Зарегистрированные пользователи</h1>
                        <div v-for="user in verifiedUsers" class="ease-in-out duration-300 mt-[5px] mb-[5px] border-indigo-400 hover:border-x-4 hover:border-x-custom-red hover:mt-1 hover:mb-1 border-2 news-card p-6 text-gray-900 dark:text-gray-100">
                            {{ user?.name }} ({{ user.email }})
                        </div>
                    </div>
                    <div v-if="unverifiedUsers" class="ms-2 basis-1/2 overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                        <h1 class="dark:text-gray-100 text-2xl font-bold text-center mt-6 mb-6">Не зарегистрированные пользователи</h1>
                        <div v-for="user in unverifiedUsers" class="ease-in-out duration-300 mt-[5px] mb-[5px] border-indigo-400 hover:border-x-4 hover:border-x-custom-red hover:mt-1 hover:mb-1 border-2 news-card p-6 text-gray-900 dark:text-gray-100">
                            {{ user?.name }} ({{ user.email }}). Отправлен код = {{ user.verification_code }}
                        </div>
                    </div>
                </div>
                <div v-if="news" class="me-2 basis-1/2 overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <h1 class="dark:text-gray-100 text-2xl font-bold text-center mt-6 mb-6">Новости</h1>
                    <div v-for="news in news.data" class="ease-in-out duration-300 mt-[5px] mb-[5px] border-indigo-400 hover:border-x-4 hover:border-x-custom-red hover:mt-1 hover:mb-1 border-2 news-card p-6 text-gray-900 dark:text-gray-100">
                        {{ news.title }}
                    </div>
                </div>
                <Paginator v-if="news" class="mt-4" :current-page="news.current_page" :total-items="news.total" :items-per-page="news.per_page"/>

            </div>
        </div>
    </ControlPanelLayout>
</template>

<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Paginator from "@/Components/Paginator.vue";
import { onMounted } from 'vue';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ControlPanelLayout from "@/Layouts/ControlPanelLayout.vue";

const props = defineProps({
  news: {
    type: Array,
  },
  verifiedUsers: {
    type: Array,
  },
  unverifiedUsers: {
    type: Array,
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

onMounted(() => {
  console.log('douigdsvhdsfslfdjbjgsvdljasgd')
  console.log(props.verifiedUsers) // <div>
})
</script>
<style scoped>
.news-card {
  border-style: solid;
  border-radius: 5px;
}
</style>
