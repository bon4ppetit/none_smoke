<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Modal from "@/Components/Modal.vue";
</script>

<template>
  <Head><title>Дневник</title></Head>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Дневник
      </h2>
    </template>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>