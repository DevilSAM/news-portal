<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
  verification_code: '',
});

const submit = () => {
  form.post(route('tg-verification.verify'));
};
</script>

<template>
  <GuestLayout>
    <Head title="Telegram Verification">
      <Title>
        Telegram Verification
      </Title>
    </Head>

    <form @submit.prevent="submit">
      <div>
        <InputLabel for="verification_code" value="Код подтверждения" />

        <TextInput
            id="verification_code"
            type="text"
            class="mt-1 block w-full"
            v-model="form.verification_code"
            required
            autofocus
        />

        <InputError class="mt-2" :message="form.errors.verification_code" />
      </div>


      <div class="flex items-center justify-between mt-4">
        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Подтвердить
        </PrimaryButton>
        <Link
            :href="route('control-panel')"
            method="get"
            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
          ПУ
        </Link>
        <Link
            :href="route('logout')"
            method="post"
            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
          Выйти
        </Link>
      </div>
    </form>
  </GuestLayout>
</template>
