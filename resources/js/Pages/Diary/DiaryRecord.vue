<script setup>

import {ref} from "vue";
import Modal from "@/Components/Modal.vue";
import DiaryAddRecord from "@/Pages/Diary/DiaryAddRecord.vue";

let viewModal = ref(false);
let listRecords = ref([]);

function getRecords() {
  axios.get(route('diary-record.get'))
      .then(res => {
        listRecords.value = res.data;
      });
}
getRecords();
</script>

<template>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg mb-8">
      <div class="px-6 py-2 flex justify-between">
        <h3 class="flex items-center text-2xl font-bold text-slate-500">
          Ваши записи:
        </h3>
        <button @click="viewModal = true" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
          Добавить запись
        </button>
      </div>
      <div v-if="Object.keys(listRecords).length === 0" class="max-w-full flex flex-col items-center">
        <div class="max-w-sm text-white bg-slate-700 text-center text-sm px-5 py-3 mb-7 rounded-lg">
          Записи послужат отличным способом услышать себя или взглянуть на свою ситуацию под другим углом в нужный момент
        </div>
        <div class="max-w-sm text-center">
          <span>У вас ещё нету записей</span>
          Добавьте новую!
        </div>
      </div>
      <Modal :show="viewModal" v-on:close="viewModal = false">
        <DiaryAddRecord></DiaryAddRecord>
      </Modal>
    </div>
  </div>
</template>

<style scoped>

</style>