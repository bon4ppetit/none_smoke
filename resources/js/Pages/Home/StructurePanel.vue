<script setup>

import {ref} from "vue";
import Modal from "@/Components/Modal.vue";
import DestroyProgress from "@/Pages/Home/DestroyProgress.vue";

const props = defineProps([
  'basicInfoSmoke',
]);

let viewModal = ref(false)

function closeModal() {
  viewModal.value = false
}



</script>

<template>
  <div class="max-w-3xl m-auto p-6 text-gray-900 dark:text-gray-100">
    <div class="flex justify-between items-center mb-4">
      <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ basicInfoSmoke['count_cigarette_dont_smoke'] }} сигарет</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Не выкуренно</p>
      </div>
      <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ basicInfoSmoke['day_dont_smoke'] }} дней</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Вы не курите</p>
      </div>
      <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ basicInfoSmoke['day_dont_smoke'] }}</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Продление жизни</p>
      </div>
    </div>
    <div class="flex justify-between">
      <div class="flex flex-col items-center mb-4">
        <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ basicInfoSmoke['money_saving'] }} руб.</h5>
          <p class="font-normal text-gray-700 dark:text-gray-400 text-center">Вы сэкономили</p>
        </div>
      </div>
      <div class="flex flex-col justify-center items-center mb-4">
        <button @click="viewModal = true"
                class="text-red-500 bg-red-900/80 px-3 py-2 rounded-lg border-2 border-red-600">
          Сбросить
          <br>
          статистику
        </button>
      </div>
      <div class="flex flex-col items-center mb-4">
        <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ basicInfoSmoke['money_spend'] }} руб.</h5>
          <p class="font-normal text-gray-700 dark:text-gray-400 text-center">
            Вы потратили
            <br>
            <span class="text-xs">(за время курения)</span>
          </p>
        </div>
      </div>
      <Modal :show="viewModal" v-on:close="closeModal">
        <DestroyProgress></DestroyProgress>
      </Modal>
    </div>
  </div>
</template>
