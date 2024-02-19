<script setup>
import Image from "@/Components/Image.vue";
import DiaryPanel from "@/Pages/Diary/DiaryPanel.vue";
import Modal from "@/Components/Modal.vue";
import {ref} from "vue";

let viewModal = ref(false);

function getClassWishVape(status) {
  switch (status) {
    case 5:
      return ["border-green-700/40 p-4 border-t-2 border-l-2 rounded-l-lg transition-all duration-700 ease-out", "w-40 h-48 cursor-pointer flex flex-col bg-green-700/40 rounded-lg mr-12 border-green-700 border-2 transition-all duration-700 ease-out"];

    case 4:
      return ["border-amber-400/40 p-4 border-t-2 border-l-2 rounded-l-lg transition-all duration-700 ease-out", "w-40 h-48 cursor-pointer flex flex-col bg-amber-400/40 rounded-lg mr-12 border-amber-400 border-2 transition-all duration-700 ease-out"];

    case 3:
      return ["border-orange-700/40 p-4 border-t-2 border-l-2 rounded-l-lg transition-all duration-700 ease-out", "w-40 h-48 cursor-pointer flex flex-col bg-orange-700/40 rounded-lg mr-12 border-orange-700 border-2 transition-all duration-700 ease-out"];

    case 2:
      return ["border-purple-700/40 p-4 border-t-2 border-l-2 rounded-l-lg transition-all duration-700 ease-out", "w-40 h-48 cursor-pointer flex flex-col bg-purple-700/40 rounded-lg mr-12 border-purple-700 border-2 transition-all duration-700 ease-out"];

    case 1:
      return ["border-red-700/40 p-4 border-t-2 border-l-2 rounded-l-lg transition-all duration-700 ease-out", "w-40 h-48 cursor-pointer flex flex-col bg-red-700/40 rounded-lg mr-12 border-red-700 border-2 transition-all duration-700 ease-out"];
  }
}

/*
* Display text in div masks
* */
let currentActiveMask;
function viewText(key) {
  //Action If Event With Current Mask
  if (currentActiveMask === key) {
    document.getElementsByClassName('w-80')[0].getElementsByClassName('text-mask')[0].classList.add('hidden');
    document.getElementsByClassName('w-80')[0].lastChild.childNodes[0].classList.remove('rotate_arrow');
    document.getElementsByClassName('w-80')[0].classList.replace('w-80', 'w-40');

    return;
  }
  currentActiveMask = key;

  let activeMask = document.getElementsByClassName('w-80');
  let div = document.getElementById(key);
  let textMask = div.getElementsByClassName('text-mask')[0]

  if (activeMask.length > 0) {
    activeMask[0].getElementsByClassName('text-mask')[0].classList.add('hidden');
    activeMask[0].lastChild.childNodes[0].classList.remove('rotate_arrow')
    activeMask[0].classList.replace('w-80', 'w-40')
  }

  div.classList.add('open_mask');
  div.classList.add('w-80');

  //View Text Mask
  textMask.classList.remove('hidden');
  textMask.classList.add('text-mask');

  //Animated Arrow Image
  div.lastChild.childNodes[0].classList.add('rotate_arrow')
}

let masks = ref({});
function getMasks(page = 1) {
  axios.get(route('api.diary.get'))
      .then((res) => {
        masks.value = res.data;
      })
}
getMasks();

</script>

<template>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg mb-8">
      <div class="px-6 py-2 flex justify-between">
        <h3 class="flex items-center text-2xl font-bold text-slate-500">
          Ваши отметки:
        </h3>
        <button @click="viewModal = true" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
          Добавить отметку
        </button>
      </div>
      <div class="px-20">
        <div class="max-w-[1100px]">
          <div id="list_masks_block" class="relative overflow-x-auto  flex p-5">
            <div v-for="(mask, idx) in masks">
              <div v-on:click="viewText(idx)" :id="idx" :class="getClassWishVape(mask.wish_vape['status'])[1]">
                <div class="text-xs text-center p-4">
                  {{ mask.created_at }}
                </div>
                <p class="flex-auto text-sm text-center mt-3">
                  {{ mask.wish_vape['wishVapeText'] }}
                </p>
                <p class="text-mask flex-auto text-sm text-center mt-3 hidden opacity-0 transition-all duration-300 ">
                  {{mask.text}}
                </p>
                <div class="flex justify-end">
                  <Image path="storage/icons/vector-2.svg" :class="getClassWishVape(mask.wish_vape['status'])[0]" text-alt="Img Arrow"></Image>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Modal :show="viewModal" v-on:close="viewModal = false">
      <DiaryPanel></DiaryPanel>
    </Modal>
  </div>
</template>

<style scoped>
.text-mask {
  animation: fadeIn 1s ease-in-out 0s;
  animation-fill-mode: forwards;
  animation-name: text_animated;
}

@keyframes open_mask {
  100% {
    width: 80px;
  }
}

@keyframes text_animated {
  100% {
    opacity: 1;
  }
}

.rotate_arrow {
  transform: rotate(180deg);
  border: none;
}

*,
html * /* override x.xhtml.ru style */
{
  scrollbar-width: thin;
  scrollbar-color: #1F2937 #111827;
}

*::-webkit-scrollbar,
html *::-webkit-scrollbar {
  height: 12px;
  width: 12px;
}
*::-webkit-scrollbar-track,
html *::-webkit-scrollbar-track {
  background: #111827;
}
*::-webkit-scrollbar-thumb,
html *::-webkit-scrollbar-thumb {
  background-color: #1F2937;
  border-radius: 5px;
  border: 3px solid #111827;
}


</style>