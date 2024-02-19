<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Регистрация" />

          <form @submit.prevent="submit">
            <div>
              <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Логин</label>
              <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                  </svg>
                </span>
                <input type="text" id="website-admin" v-model="form.name" required autofocus autocomplete="name" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green">
              </div>
              <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Почта</label>
                  <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                      <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                      </svg>
                    </span>
                  <input type="text" id="email" v-model="form.email" required autocomplete="username" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@gmail.com">
                </div>
              <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
              <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Пароль</label>
              <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                      <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M21 13V8C21 6.89543 20.1046 6 19 6H5C3.89543 6 3 6.89543 3 8V14C3 15.1046 3.89543 16 5 16H12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M14.5 18.5L16.5 20.5L20.5 16.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M12 11.01L12.01 10.9989" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M16 11.01L16.01 10.9989" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M8 11.01L8.01 10.9989" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                    </span>
                <input type="password" id="email" v-model="form.password" required autocomplete="new-password" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="*******">
              </div>
              <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
              <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Подтвердить пароль</label>
              <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                      <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M21 13V8C21 6.89543 20.1046 6 19 6H5C3.89543 6 3 6.89543 3 8V14C3 15.1046 3.89543 16 5 16H12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M14.5 18.5L16.5 20.5L20.5 16.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M12 11.01L12.01 10.9989" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M16 11.01L16.01 10.9989" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M8 11.01L8.01 10.9989" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                    </span>
                <input type="password" id="email" v-model="form.password_confirmation" required autocomplete="new-password" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="*******">
              </div>
              <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
              <Link
                  :href="route('login')"
                  class="text-sm text-gray-400 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800"
              >
                Уже зарегистрированы?
              </Link>

              <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Зарегистрироваться
              </PrimaryButton>
            </div>
          </form>
    </GuestLayout>
</template>
