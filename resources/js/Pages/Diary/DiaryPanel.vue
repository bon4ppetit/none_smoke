<script setup>
  import {ref} from "vue";
  import {data} from "autoprefixer";

  let inputData = ref('');

  function sendForm() {
    axios.post(route('api.diary.add'), {
        text: inputData.value
      })
        .then((res) => {
          console.log(res.data)
        })
        .catch((err) => {
          console.log('error')
        })
  }
</script>

<template>
    <div class="text-white">
      <h1 class="text-2xl font-bold">
        Время для отметки
      </h1>
      <p class="p-5">
        Отметьте ваши впечатления о последних днях в борьбе с зависимостью
      </p>
    </div>
    <div>
      <input type="text" v-model="inputData" class="bg-gray-900 text-white ml-5 border-0 rounded w-2/4 h-40">
    </div>
  <div class="p-5">
    <button @click="sendForm" class="px-4 py-2 bg-violet-900/80 rounded-lg border-violet-700 border-2 text-white">
      Готово
    </button>
  </div>
</template>

<style scoped>

</style>