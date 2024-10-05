<template>
  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
        <h1 class="dark:text-gray-100 text-2xl font-bold text-center mt-6 mb-6">
          {{ title }}
        </h1>
        <div v-for="user in users" class="ease-in-out duration-300 mt-[5px] mb-[5px] border-indigo-400 hover:border-x-4 hover:border-x-custom-red hover:mt-1 hover:mb-1 border-2 news-card p-6 text-gray-900 dark:text-gray-100">
          <p>Имя: {{ user?.name }}</p>
          <p class="my-2">Email: {{ user.email }}</p>
          <p v-if="showCode">Код: {{ user.verification_code }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  users: {
    type: Array,
    required: true
  },
  title: {
    type: String,
    required: true
  },
  showCode: {
    type: Boolean,
    default: false
  }
})
</script>
<style scoped>
.news-card {
  border-style: solid;
  border-radius: 5px;
}
</style>
