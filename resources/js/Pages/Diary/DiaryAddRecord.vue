<script setup>

import Image from "@/Components/Image.vue";
import {ref} from "vue";
let optionForm = ref(1);

function animateButtonOption(numOption) {
  optionForm.value = numOption;

  let wrapperOptions = document.querySelector('.wrapper-options');
  let wrapperOptionsWidth = wrapperOptions.offsetWidth;
  let wrapperOptionsMarginX = window.getComputedStyle(wrapperOptions).marginLeft.slice(0, -2);

  let widthSelectOption = document.querySelector(`.option-${numOption}`).offsetWidth;
  let marginLeft = wrapperOptionsWidth - widthSelectOption + +wrapperOptionsMarginX + 28;

  if (numOption === 1) {
    marginLeft = +wrapperOptionsMarginX + 28;
  }

  document.querySelector('.option-main').style.left = `${marginLeft}px`;
  document.querySelector('.option-main').style.width = `${widthSelectOption}px`;
}

</script>

<template>
  <div class="p-7 text-white">
    <div class="flex items-center mb-3">
      <Image path="./storage/welcome_page/3.png" class="w-[32px]"></Image>
      <h1 class="font-bold text-xl text-slate-400 ml-1">
        Добавить новую запись
      </h1>
    </div>
    <div>
      <p class="text-sm mb-5">
        В названии записи можно указать вопрос и следом дать на него ответ.
        Или выбрать готовый вопрос и ответить на него
      </p>
      <div class="wrapper-options max-w-sm m-auto flex justify-between text-sm mb-8">
        <div class="option-main border-2 border-slate-500 bg-slate-600 transition-all duration-700 rounded-2xl shadow-2xl shadow-slate-900 absolute h-[56px] z-0 w-[189px]"></div>
        <button v-on:click="animateButtonOption(1)" class="option-1 leading-4 py-3 px-5 relative z-1">
          Использовать готовый <br> вопрос
        </button>
        <button v-on:click="animateButtonOption(2)" class="option-2 leading-4 py-3 px-5 relative z-1">
          Написать вопрос <br> самому
        </button>
      </div>
      <div class="">
        <div v-if="optionForm === 1" class="">
          <p>
            Выберите вопрос из списка
          </p>
          <label>
            <span>First</span>
            <input type="radio">
          </label>
        </div>
        <div v-else-if="optionForm === 2">
2
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
</style>