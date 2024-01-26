<script setup>

import InputLabel from "@/Components/InputLabel.vue";
import {ref} from "vue";

const props = defineProps([
    'viewGoalEdit',
])

let inputPrice = ref(0);
let inputName = ref('');

function sendForm() {

  axios.post(route('goal.add'), {
    name: inputName.value,
    price: inputPrice.value
  })
      .then(() => {
        window.location.reload()
      })
      .catch((err) => {
        if (err.code === "ERR_BAD_REQUEST") {
          alert('Отправельные данные не валидны! Пожалуйста, проверьте правильность заполнения')
        }
      })
}

</script>

<template>
    <div class="flex flex-col justify-between h-60 m-auto max-w-xl p-5">
      <div class="flex items-center justify-between">
        <InputLabel :value="'Введите название цели'"></InputLabel>
        <input v-model="inputName" type="text" maxlength="40" class="bg-gray-900 text-white ml-5 border-0 flex-1 rounded">
      </div>
      <div class="flex items-center justify-between">
        <InputLabel :value="'Введите сумму'"></InputLabel>
        <div>
          <input type="number" v-model="inputPrice" class="bg-gray-900 text-white ml-5 border-0 rounded">
          <span class="ml-3 text-white">руб.</span>
        </div>
      </div>
      <div class="flex justify-between">
        <button  @click="close" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
          Отменить
        </button>
        <button @click="sendForm" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
          Добавить
        </button>
      </div>
    </div>
</template>

<style scoped>

</style>