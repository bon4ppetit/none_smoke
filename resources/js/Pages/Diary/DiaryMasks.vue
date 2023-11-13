<script setup>
import Image from "@/Components/Image.vue";
import {TailwindPagination} from "laravel-vue-pagination";
import {data} from "autoprefixer";


const props = defineProps([
  'masks',
])

</script>

<template>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
      <div class="bg-gray-700 p-6">
        <h3 class="">
          Ваши отметки:
        </h3>
      </div>
      <div class="bg-gray-800 p-6 px-20 mt-4">
        <div class="flex justify-between">
          <button class="px-4 py-2 bg-violet-900/80 flex items-center rounded-lg border-violet-700 border-2">
            <Image class="mr-2" path="storage/ico/arrow-left.svg" text-alt="Img Welcome 1"></Image>
            <span>
              Назад
            </span>
          </button>
          <button class="px-4 py-2 flex items-center bg-violet-900/80 rounded-lg border-violet-700 border-2">
            <span class="mr-2">
              Далее
            </span>
            <Image path="storage/ico/arrow-right.svg" text-alt="Img Welcome 1"></Image>
          </button>
        </div>

        <div class="flex p-10 px-5">
          <div v-for="mask in masks">
            <div v-if="mask.wish_vape === 5" class="w-40 h-48 bg-green-700/40 rounded-lg mr-12 border-green-700 border-2 p-4">
              <div class="text-xs text-center">
                {{ mask.created_at }}
              </div>
              <p class="text-sm text-center mt-3">
                Сдержался
                на легке
              </p>
            </div>
            <div v-else-if="mask.wish_vape === 4" class="w-40 h-48 p-4 bg-amber-400/40 rounded-lg mr-12 border-amber-400 border-2">
              <div class="text-xs text-center">
                {{ mask.created_at }}
              </div>
              <p class="text-sm text-center mt-3">
                Сдержался,
                было пару мыслей
              </p>
            </div>
            <div v-else-if="mask.wish_vape === 3" class="w-40 h-48 p-4 bg-orange-700/40 rounded-lg mr-12 border-orange-700 border-2">
              <div class="text-xs text-center">
                {{ mask.created_at }}
              </div>
              <p class="text-sm text-center mt-3">
                Сдержался, но
                много думал
                об этом
              </p>
            </div>
            <div v-else-if="mask.wish_vape === 2" class="w-40 h-48 p-4 bg-purple-700/40 rounded-lg mr-12 border-purple-700 border-2">
              <div class="text-xs text-center">
                {{ mask.created_at }}
              </div>
              <p class="text-sm text-center mt-3">
                Было тяжело
                и мучительно, но
                сдержался
              </p>
            </div>
            <div v-else-if="mask.wish_vape === 1" class="w-40 h-48 p-4 bg-red-700/40 rounded-lg mr-12 border-red-700 border-2">
              <div class="text-xs text-center">
                {{ mask.created_at }}
              </div>
              <p class="text-sm text-center mt-3">
                Не получилось
                сдержаться
              </p>
            </div>
          </div>
        </div>

        <TailwindPagination class="mt-6" :data="masks" :limit="6" />
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>