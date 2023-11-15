<script setup>
import Image from "@/Components/Image.vue";
import {TailwindPagination} from "laravel-vue-pagination";


const props = defineProps([
  'masks',
])

let displayMaskText = false;

function getClassWishVape(status) {
  switch (status) {
    case 5:
      return ["border-green-700/40 p-4 border-t-2 border-l-2 rounded-l-lg transition-all duration-400 ease-out", "w-40 h-48 cursor-pointer flex flex-col bg-green-700/40 rounded-lg mr-12 border-green-700 border-2 transition-all duration-200 ease-out"];

    case 4:
      return ["border-amber-400/40 p-4 border-t-2 border-l-2 rounded-l-lg transition-all duration-400 ease-out", "w-40 h-48 cursor-pointer flex flex-col bg-amber-400/40 rounded-lg mr-12 border-amber-400 border-2 transition-all duration-200 ease-out"];

    case 3:
      return ["border-orange-700/40 p-4 border-t-2 border-l-2 rounded-l-lg transition-all duration-400 ease-out", "w-40 h-48 cursor-pointer flex flex-col bg-orange-700/40 rounded-lg mr-12 border-orange-700 border-2 transition-all duration-200 ease-out"];

    case 2:
      return ["border-purple-700/40 p-4 border-t-2 border-l-2 rounded-l-lg transition-all duration-400 ease-out", "w-40 h-48 cursor-pointer flex flex-col bg-purple-700/40 rounded-lg mr-12 border-purple-700 border-2 transition-all duration-200 ease-out"];

    case 1:
      return ["border-red-700/40 p-4 border-t-2 border-l-2 rounded-l-lg transition-all duration-400 ease-out", "w-40 h-48 cursor-pointer flex flex-col bg-red-700/40 rounded-lg mr-12 border-red-700 border-2 transition-all duration-200 ease-out"];
  }
}


/*
* Display text in div masks
* */
function viewText(key) {
  let list = document.getElementsByClassName('w-80');
  let div = document.getElementById(key);
  let textMask = div.getElementsByClassName('text-mask')[0]

  for(let item of list) {
    item.classList.replace('w-80', 'w-40')
    item.getElementsByClassName('text-mask')[0].classList.add('hidden');

    item.lastChild.childNodes[0].classList.remove('rotate-180')
  }

  div.classList.add('w-80');
  textMask.classList.remove('hidden');

  //Animated Arrow Image
  div.lastChild.childNodes[0].classList.add('rotate-180')
}

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
          <div v-for="(mask, idx) in masks">
            <div v-on:click="viewText(idx)" :id="idx" :class="getClassWishVape(mask.wish_vape['status'])[1]">
              <div class="text-xs text-center p-4">
                {{ mask.created_at }}
              </div>
              <p class="flex-auto text-sm text-center mt-3">
                {{ mask.wish_vape['wishVapeText'] }}
              </p>
              <p class="text-mask flex-auto text-sm text-center mt-3 hidden">
                {{mask.text}}
              </p>
              <div class="flex justify-end">
                <Image path="storage/ico/arrow-right.svg" :class="getClassWishVape(mask.wish_vape['status'])[0]" text-alt="Img Arrow"></Image>
              </div>
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