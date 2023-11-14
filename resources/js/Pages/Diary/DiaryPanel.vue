<script setup>
  import {ref} from "vue";

  let inputData = ref('');
  let wish_vape = 0;

  function sendForm() {
    axios.post(route('api.diary.add'), {
        text: inputData.value,
        wish_vape: wish_vape
      })
        .then(() => {
          window.location.reload();
        })
        .catch(() => {
          console.log('error');
        })
  }
</script>

<template>
  <div class="text-white">
      <h1 class="text-2xl font-bold">
        Время для отметки
      </h1>
      <p class="">
        Отметьте ваши впечатления о последних днях в борьбе с зависимостью
      </p>
    </div>
    <div class="p-5 text-white">
      <p>
        Оцените, на сколько хорошо прошли последние дни
      </p>
      <p class="text-xs text-gray-400">
        В начале шкалы, вам было очень трудно сдержаться
      </p>
      <p class="text-xs text-gray-400">
        В конце шкалы, вас совсем не тревожила мысль о курении
      </p>
      <div class="mt-4 pl-5 text-sm">
        <div class="cursor-pointer mr-5 py-1" @click="wish_vape = 1">
          У меня не получилось сдержаться
        </div>
        <div class="cursor-pointer mr-5 py-1" @click="wish_vape = 2">
          Было тяжело и мучительно, но я сдержался
        </div>
        <div class="cursor-pointer mr-5 py-1" @click="wish_vape = 3">
          Я сдержался, но много думал об этом
        </div>
        <div class="cursor-pointer mr-5 py-1" @click="wish_vape = 4">
          Было пару мыслей
        </div>
        <div class="cursor-pointer mr-5 py-1" @click="wish_vape = 5">
          Сдержался на легке, ни мыли о курении
        </div>
      </div>
    </div>
    <div class="p-5 text-white">
      <p class="mb-5">
        Расскажите немного о своих пережитых днях?
      </p>
      <input type="text" v-model="inputData" class="text-sm bg-gray-900 text-white ml-5 border-0 rounded w-2/4">
    </div>
    <div class="p-5">
      <button @click="sendForm" class="px-4 py-2 bg-violet-900/80 rounded-lg border-violet-700 border-2 text-white">
        Готово
      </button>
    </div>
</template>

<style scoped>

</style>