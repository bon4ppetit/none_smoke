<script setup>

import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Image from "@/Components/Image.vue";
import * as animate from "../AnimationPagesScripts/WelcomeAnimation.js";
import {ref} from "vue";

defineProps({
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

let showingPanel = ref(1);

function viewPanel(currentPanel, nextPanel) {

  let currentDiv = document.querySelector(`.panel-${currentPanel}`);
  currentDiv.className += ' panel-close';

  setTimeout(() => {
    showingPanel.value = nextPanel;
    currentDiv.classList.remove('panel-close');
  }, 600);
}


</script>

<template>
    <Head title="None Smoke" />
    <div
        class="bg-gray-900 text-white selection:bg-red-500 selection:text-white px-5"
    >
      <div class="pt-12 min-h-screen flex items-center">
        <div class="wrapper-panel flex flex-auto m-auto items-center justify-center min-h-[400px]">
          <div class="max-w-[50%] flex-auto min-h-full text-center">
            <div class="mb-[15px]">
              <h1 class="text-slate-500 font-bold text-5xl">
                <div class="flex justify-center">
                  <span>None Sm</span><ApplicationLogo class="w-[45px] h-[45px]"></ApplicationLogo><span>ke</span>
                </div>
              </h1>
              <span class="text-slate-500">Оставь привычку курить позади!</span>
            </div>
            <div class="max-w-[300px] m-auto">
              Мы предлагаем вам простой и удобный <span class="text-pink-500">способ</span> отслеживать свой прогресс <span class="text-pink-500"><br>в борьбе с курением</span>

            </div>
          </div>
          <div v-if="showingPanel === 1" class="panel-1 max-w-[50%] flex-auto flex flex-col justify-center items-center min-h-full">
            <p class="max-w-[350px] p-3 border-2 rounded-lg border-slate-700 mb-[20px]">
              Мы предлагаем вам простой и удобный <span class="text-pink-500">способ</span> отслеживать свой прогресс <span class="text-pink-500">в борьбе с курением</span>. Наш сайт представляет собой веб-приложение, которое ведет счетчик дней, в течение которых вы не курили.
            </p>
            <div>
              <button v-on:click="viewPanel(1, 2)" class="mr-[20px] text-white bg-gradient-to-r from-slate-600 to-slate-700 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Больше о приложении
              </button>
              <Link :href="route('register')"
                  class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Войти в аккаунт
              </Link>
            </div>
          </div>
          <div v-if="showingPanel === 2" class="panel-2 max-w-[50%] flex-auto flex flex-col p-8 justify-center items-center min-h-full">
            <h3 class="text-slate-500 w-full font-bold text-2xl mb-[20px]">
              Отслеживай свой прогресс
            </h3>
            <div class="w-full flex justify-between items-center mb-[20px]">
              <p class="max-w-[270px] p-3 border-2 rounded-lg border-slate-700 text-sm">
                Благодаря <span class="text-pink-500">счётчику дней</span> и удобным <span class="text-pink-500">диаграммам</span>, вы можете следить за своим <span class="text-pink-500">прогрессом</span>
              </p>
              <Image class="max-w-[100px] relative" path="storage/welcome_page/2.png"></Image>
            </div>
            <div class="w-full flex justify-between">
              <button v-on:click="viewPanel(2, 3)" class="mr-[20px] text-white bg-gradient-to-r from-slate-600 to-slate-700 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Продолжить
              </button>
              <Link :href="route('register')"
                    class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Войти в аккаунт
              </Link>
            </div>
          </div>
          <div v-if="showingPanel === 3" class="panel-3 max-w-[50%] flex-auto flex flex-col p-8 justify-center items-center min-h-full">
            <h3 class="text-slate-500 w-full font-bold text-2xl mb-[20px]">
              Веди личный дневник
            </h3>
            <div class="w-full flex justify-between items-center mb-[20px]">
                <p class="max-w-[270px] p-3 border-2 rounded-lg border-slate-700 text-sm">
                  В дневнике, вы можете оставлять <span class="text-pink-500">записи</span> о поводах <span class="text-pink-500"> бросить </span> и <span class="text-pink-500">начать</span> курить, так же вести записи своего <span class="text-pink-500">самочувствия</span>.
                </p>
              <Image class="w-[90px] relative" path="storage/welcome_page/3.png"></Image>
            </div>
            <div class="w-full flex justify-between">
              <button v-on:click="viewPanel(3, 4)" class="mr-[20px] text-white bg-gradient-to-r from-slate-600 to-slate-700 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Продолжить
              </button>
              <Link :href="route('register')"
                    class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Войти в аккаунт
              </Link>
            </div>
          </div>
          <div v-if="showingPanel === 4" class="panel-4 max-w-[50%] flex-auto flex flex-col p-8 justify-center items-center min-h-full">
            <h3 class="text-slate-500 w-full font-bold text-2xl mb-[20px]">
              Получай достижения
            </h3>
            <div class="w-full flex justify-between items-center mb-[20px]">
              <div>
                <p class="max-w-[270px] p-3 border-2 rounded-lg border-slate-700 text-sm">
                  За дни без курения вы будете получать достижения и сможете открывать новые возможности приложения
                </p>
                <p class="max-w-[270px] p-3 text-sm text-slate-600">
                  Например, рамку для аватара, разновидности отчетов, виды дизайна приложения и прочее
                </p>
              </div>
              <Image class="w-[90px] relative" path="storage/welcome_page/4.png"></Image>
            </div>
            <div class="w-full flex justify-between">
              <button v-on:click="viewPanel(4, 5)" class="mr-[20px] text-white bg-gradient-to-r from-slate-600 to-slate-700 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Продолжить
              </button>
              <Link :href="route('register')"
                    class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Войти в аккаунт
              </Link>
            </div>
          </div>
          <div v-if="showingPanel === 5" class="panel-5 max-w-[50%] flex-auto flex flex-col p-8 justify-center items-center min-h-full">
            <h3 class="text-slate-500 w-full font-bold text-xl mb-[20px]">
              Начни новый образ жизни
              с небольшого шага!
            </h3>
            <div class="w-full flex justify-end">
              <Link
                  :href="route('register')"
                  class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
              >
                Войти в аккаунт
              </Link
              >
            </div>
          </div>
        </div>
      </div>
      </div>
</template>

<style>
.wrapper-panel {
  max-width: 900px;
}

.panel-close {
  animation: panel-close_animation 0.6s backwards;
}

.arrow_1-animation {
  animation: arrow_1-animation 1.7s infinite forwards;
  animation-direction:alternate;
  animation-delay: 0.6s;
  animation-timing-function: ease-in-out;
}

@keyframes arrow_1-animation {
  0% {
    position: relative;
    top: 0px;
    opacity: 1;
  }
  55% {
    opacity: 0;
  }
  100% {
    position: relative;
    opacity: 0;
    top: 55px;
  }
}

@keyframes panel-close_animation {
  100% {
    opacity: 0;
    transform: scale(96%);
  }
}

</style>
