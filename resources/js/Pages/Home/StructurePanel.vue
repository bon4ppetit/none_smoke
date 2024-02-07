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
    <div class="min-h-[260px] flex justify-between media_style-700-wrapper">
      <div class="max-w-[185px] min-h-full flex-1 media_style-700-item-1">
        <div class="absolute w-[185px] h-[112.5px] z-0 overflow-hidden rounded-lg">
          <div class="block_data-animate-1 h-full relative top-[-20px] left-[-20px] bg-gradient-to-br from-purple-500 to-gray-900 "></div>
        </div>
        <div class="min-w-full p-6 border mb-4 rounded-lg shadow border-gray-700 overflow-hidden">
          <h5 class="mb-2 text-2xl font-bold tracking-tight relative z-1">{{ basicInfoSmoke['count_cigarette_dont_smoke'] }} сигарет</h5>
          <p class="text-gray-400 relative z-1">Не выкуренно</p>
        </div>
        <div class="absolute w-[185px] h-[112.5px] z-0 overflow-hidden rounded-lg">
          <div class="block_data-animate-2 h-full relative top-[20px] left-[-20px] bg-gradient-to-bl from-gray-900 to-purple-500"></div>
        </div>
        <div class="flex flex-col items-center relative z-1">
          <div class="min-w-full p-6 border rounded-lg shadow border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ basicInfoSmoke['money_saving'] }} руб.</h5>
            <p class="font-normal text-gray-400">Вы сэкономили</p>
          </div>
        </div>
      </div>
      <div class="min-h-full media_style-700-item-2">
        <div class="mb-4 p-6 media_style-700-item-2-subitem-1">
          <h5 class="mb-2 text-5xl font-bold tracking-tight bg-gradient-to-r from-purple-500 to-pink-500 text-transparent bg-clip-text">{{ basicInfoSmoke['day_dont_smoke'] }} дней</h5>
          <p class="text-gray-400">Вы не курите</p>
        </div>
        <div class="min-h-[113px] flex justify-center items-center media_style-700-item-2-subitem-2">
          <button @click="viewModal = true"
                  class="text-red-500 bg-red-900/80 px-3 py-2 rounded-lg border-2 border-red-600">
            Сбросить
            <br>
            статистику
          </button>
        </div>
      </div>
      <div class="min-h-full max-w-[185px] media_style-700-item-3">
        <div class="absolute w-[183px] h-[112.5px] z-0 overflow-hidden rounded-lg">
          <div class="block_data-animate-3 h-full relative top-[-20px] left-[20px] bg-gradient-to-tr from-gray-900 to-purple-500"></div>
        </div>
        <div class="mb-4 min-w-full p-6 border rounded-lg shadow border-gray-700 relative z-1">
          <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ basicInfoSmoke['day_dont_smoke'] }} дней</h5>
          <p class="text-gray-400">Продление жизни</p>
        </div>
        <div class="absolute w-[183px] h-[113px] z-0 overflow-hidden rounded-lg">
          <div class="block_data-animate-4 h-full relative top-6 left-3 bg-gradient-to-br from-gray-900 to-purple-500 "></div>
        </div>
        <div class="min-w-full p-6 border rounded-lg shadow border-gray-700 relative z-1">
          <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ basicInfoSmoke['money_spend'] }} руб.</h5>
          <p class="text-gray-400">
            Вы потратили
          </p>
        </div>
      </div>
    </div>
      <Modal :show="viewModal" v-on:close="closeModal">
        <DestroyProgress></DestroyProgress>
      </Modal>
  </div>
</template>

<style>

.block_data-animate-1 {
  border-radius: 5px 15px 100px 5px;
}

.block_data-animate-2 {
  border-radius: 5px 100px 5px 5px;
}

.block_data-animate-3 {
  border-radius: 5px 5px 5px 100px;
}

.block_data-animate-4 {
  border-radius: 100px 15px 5px 5px;
}

@media (max-width: 700px) {
  .media_style-700-wrapper {
    max-width: 380px;
    margin: 0 auto;
    display: grid;
    grid-template-areas: 'item-2 item-2' 'item-1 item-3';
  }

  .media_style-700-item-1 {
    grid-area: item-1;
  }
  .media_style-700-item-2 {
    grid-area: item-2;
    display: flex;
    justify-content: space-between;
  }
  .media_style-700-item-3 {
    grid-area: item-3;
  }
  .media_style-700-item-2-subitem-1 {
    padding: 0;
  }
  .media_style-700-item-2-subitem-2 {
    width: 180px;
  }
}

@media (max-width: 425px) {
  .media_style-700-wrapper {
    grid-template-areas: 'item-2' 'item-1' 'item-3';
    justify-content: center;
  }
  .media_style-700-item-2 {
    flex-direction: column;
  }
  .media_style-700-item-1 {
    margin-bottom: 17px;
  }
}

</style>
