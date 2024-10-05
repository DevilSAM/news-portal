<template>
  <div class="min-h-screen pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
      <!-- Primary Navigation Menu -->
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
              <Link :href="route('home')">
                <ApplicationLogo
                    view-box="0 0 300 100"
                    :use-cross-second-line="false"
                    class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                />
              </Link>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
              <NavLink :href="route('control-panel')" :active="route().current('control-panel')">
                Пользователи
              </NavLink>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
              <NavLink :href="route('control-panel.unverified')" :active="route().current('control-panel.unverified')">
                Ожидают подтверждения
              </NavLink>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
              <NavLink :href="route('control-panel.news')" :active="route().current('control-panel.news')">
                Новости
              </NavLink>
            </div>
          </div>
          <div class="hidden sm:flex sm:items-center sm:ms-6">
            <Link
                :href="route('home')"
                class="button rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
              <SecondaryButton>
                Домой
              </SecondaryButton>
            </Link>
          </div>
        </div>
      </div>
    </nav>

    <div
        class="w-full mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
    >
      <slot />
    </div>
  </div>
</template>
<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
</script>
