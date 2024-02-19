<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DiaryWishVape from "@/Pages/Diary/DiaryWishVape.vue";
import DiaryRecord from "@/Pages/Diary/DiaryRecord.vue";

const props = defineProps([
    'masks',
])

</script>

<template>
  <Head><title>Дневник</title></Head>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Дневник
      </h2>
    </template>
    <div class="py-12 text-white">
      <DiaryWishVape :masks="masks"></DiaryWishVape>
    </div>
    <div class="py-12 text-white">
      <DiaryRecord :masks="masks"></DiaryRecord>
    </div>

  </AuthenticatedLayout>
</template>

<style scoped>

</style>