<script setup>

import {ref} from "vue";

let jsonData = ref({});

function getMotivationSentence() {
  axios.get('api/profile/motivation')
      .then(res => {
        jsonData.value = res.data;
      });
}
getMotivationSentence();

</script>

<template>
  <div class="max-w-2xl m-auto p-6 text-gray-100 mb-[30px]">
    <div class="min-h-[100px]">
      <template v-if="jsonData.isMainDay === true">
        <p class="text-xl font-bold text-slate-500 mb-3">
          Вы большой молодец!
        </p>
        <p class="text-xl text-center">
          Вы продержались
          <span class="text-3xl font-bold">{{ jsonData.day }}</span>
          дней без курения
        </p>
        <p class="text-sm text-center">
          {{ jsonData.text }}
        </p>
      </template>
      <template v-else-if="jsonData.isMainDay === false">
          <h4 class="text-xl font-bold text-slate-500 mb-3">
            Интересный факт
          </h4>
          <p class="text-center">
            {{ jsonData.text }}
          </p>
      </template>
    </div>
  </div>
</template>

<style scoped>

</style>