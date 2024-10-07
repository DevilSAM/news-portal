<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

// Пропсы для передачи данных о пагинации из контроллера
const props = defineProps({
  currentPage: {
    type: Number,
    required: true,
  },
  totalItems: {
    type: Number,
    required: true,
  },
  itemsPerPage: {
    type: Number,
    required: true,
  },
  newsUrlRouteName: {
    type: String,
    default: 'news'
  },
});

// Вычисляем общее количество страниц
const totalPages = computed(() => Math.ceil(props.totalItems / props.itemsPerPage));

// Функция для генерации ссылки на страницу
const generatePageLink = (page) => {
  return route(props.newsUrlRouteName, { page });
};

// Генерируем массив страниц для кнопок пагинации
const pages = computed(() => {
  let range = [];
  for (let i = 1; i <= totalPages.value; i++) {
    range.push(i);
  }
  return range;
});

</script>

<template>
  <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Showing
        <span class="font-medium">{{ (props.currentPage - 1) * props.itemsPerPage + 1 }}</span>
        to
        <span class="font-medium">
          {{ Math.min(props.currentPage * props.itemsPerPage, props.totalItems) }}
        </span>
        of
        <span class="font-medium">{{ props.totalItems }}</span>
        results
      </p>
    </div>
    <div>
      <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
        <!-- Кнопка "Previous" -->
        <Link
            :href="generatePageLink(props.currentPage - 1)"
            class="dark:text-gray-100 hover:text-gray-700 relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
            :class="{'cursor-not-allowed': props.currentPage === 1}"
        >
          <span class="sr-only">Previous</span>
          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
          </svg>
        </Link>

        <!-- Кнопки с номерами страниц -->
        <template v-for="page in pages" :key="page">
          <Link
              :href="generatePageLink(page)"
              :class="page === props.currentPage
              ? 'z-10 bg-indigo-600 text-white'
              : 'dark:text-gray-100 hover:text-gray-700 text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50'"
              class="relative inline-flex items-center px-4 py-2 text-sm font-semibold focus:z-20 focus:outline-offset-0"
          >
            {{ page }}
          </Link>
        </template>

        <!-- Кнопка "Next" -->
        <Link
            :href="generatePageLink(props.currentPage + 1)"
            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
            :class="{'cursor-not-allowed': props.currentPage === totalPages}"
        >
          <span class="sr-only">Next</span>
          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
          </svg>
        </Link>
      </nav>
    </div>
  </div>
</template>
