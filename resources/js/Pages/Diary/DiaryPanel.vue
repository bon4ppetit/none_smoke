<script setup>
  import {ref} from "vue";

  let inputData = ref('');
  let wishVape = 0;

  function sendForm() {
    axios.post(route('api.diary.add'), {
        text: inputData.value,
        wish_vape: wishVape
      })
      .then(() => {
        window.location.reload();
      })
      .catch((res) => {
        console.log('error: ' + res);
      })
  }

  function setWishVape(num)
  {
    let wishVapeBlock = document.getElementById('wish_vape_' + num);
    let arrWishVapeBlock = document.getElementsByClassName('wish_vape_block_style');

    for (let item of arrWishVapeBlock) {
      item.classList.remove('wish_vape_block_style')
    }


    wishVapeBlock.classList.add('wish_vape_block_style')
    wishVape = num;
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
      <div class="mt-4 pl-5 text-sm w-2/4">
        <div @click="setWishVape(1)" id="wish_vape_1" class="cursor-pointer py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
          У меня не получилось сдержаться
        </div>
        <div @click="setWishVape(2)" id="wish_vape_2" class="cursor-pointer py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
          Было тяжело и мучительно, но я сдержался
        </div>
        <div @click="setWishVape(3)" id="wish_vape_3" class="cursor-pointer py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
          Я сдержался, но много думал об этом
        </div>
        <div @click="setWishVape(4)" id="wish_vape_4" class="cursor-pointer py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
          Было пару мыслей
        </div>
        <div @click="setWishVape(5)" id="wish_vape_5" class="cursor-pointer py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
          Сдержался на легке, ни мыли о курении
        </div>
      </div>
    </div>
    <div class="p-5 text-white">
      <p class="mb-2">
        Расскажите немного о своих пережитых днях
      </p>
      <input type="text" v-model="inputData" class="text-sm bg-gray-900 text-white ml-5 border-0 rounded w-2/4">
    </div>
    <div class="pl-5 mt-2 flex justify-end w-2/4">
      <button @click="sendForm" class="px-4 py-2 bg-violet-900/80 rounded-lg border-violet-700 border-2 text-white">
        Готово
      </button>
    </div>
</template>

<style scoped>
  .wish_vape_block_style {
    background-color: #374151;
    color: white;
  }
</style>