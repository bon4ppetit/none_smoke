<script setup>

import InputLabel from "@/Components/InputLabel.vue";
import {ref} from "vue";

const props = defineProps([
    'viewGoalEdit'
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

function cancelSending() {
  // props.viewGoalEdit = false;
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
      <div class="flex justify-end">
        <button @click="cancelSending" class="px-4 py-2 bg-violet-700/80 rounded-lg border-violet-700 border-2 text-white">
          Отменить
        </button>
        <button @click="sendForm" class="px-4 py-2 bg-violet-700/80 rounded-lg border-violet-700 border-2 text-white">
          Добавить
        </button>
      </div>
    </div>
</template>

<style scoped>

</style>