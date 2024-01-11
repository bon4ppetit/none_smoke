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
  <div class="max-w-3xl m-auto p-6 text-gray-100 text-center">
    <div class="min-h-[260px] flex justify-between mb-[50px]">
      <div class=" max-w-[185px] min-h-full flex-1">
        <div class="min-w-full p-6 border mb-4 rounded-lg shadow border-gray-700 ">
          <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ basicInfoSmoke['count_cigarette_dont_smoke'] }} сигарет</h5>
          <p class="text-gray-400">Не выкуренно</p>
        </div>
        <div class="flex flex-col items-center">
          <div class="min-w-full p-6 border rounded-lg shadow border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ basicInfoSmoke['money_saving'] }} руб.</h5>
            <p class="font-normal text-gray-400">Вы сэкономили</p>
          </div>
        </div>
      </div>
      <div class="min-h-full">
        <div class="mb-4 p-6">
          <h5 class="mb-2 text-5xl font-bold tracking-tight bg-gradient-to-r from-purple-500 to-pink-500 text-transparent bg-clip-text">{{ basicInfoSmoke['day_dont_smoke'] }} дней</h5>
          <p class="text-gray-400">Вы не курите</p>
        </div>
        <div class="w-full min-h-[113px] flex justify-center items-center">
          <button @click="viewModal = true"
                  class="text-red-500 bg-red-900/80 px-3 py-2 rounded-lg border-2 border-red-600">
            Сбросить
            <br>
            статистику
          </button>
        </div>
      </div>
      <div class="min-h-full max-w-[185px]">
        <div class="mb-4 min-w-full p-6 border rounded-lg shadow border-gray-700">
          <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ basicInfoSmoke['day_dont_smoke'] }}</h5>
          <p class="text-gray-400">Продление жизни</p>
        </div>
        <div class="min-w-full p-6 border rounded-lg shadow border-gray-700">
          <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ basicInfoSmoke['money_spend'] }} руб.</h5>
          <p class="text-gray-400">
            Вы потратили
          </p>
        </div>
      </div>
    </div>
    <div class="flex justify-between">
      <Modal :show="viewModal" v-on:close="closeModal">
        <DestroyProgress></DestroyProgress>
      </Modal>
    </div>
  </div>
</template>
