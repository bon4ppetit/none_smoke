<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Image from "@/Components/Image.vue";
import * as animate from "../AnimationPagesScripts/WelcomeAnimation.js";

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

</script>

<template>
    <Head title="None Smoke" />
    <div
        class="bg-gray-100 dark:bg-gray-900 text-white selection:bg-red-500 selection:text-white px-5"
    >
      <div class="pt-12 min-h-screen">
        <div class="wrapper-content flex flex-col items-center justify-center min-h-[200px]">
          <h1 class="text-slate-500 font-bold text-8xl">
            <div class="flex">
              <span>None Sm</span><ApplicationLogo class="w-[85px] h-[85px]"></ApplicationLogo><span>ke</span>
            </div>
          </h1>
          <span class="text-slate-500">Оставь привычку курить позади!</span>
        </div>
        <div class="wrapper-content min-h-[400px] flex justify-between items-center relative top-[60px]">
          <div class="w-full flex justify-between">
            <div class="max-w-xs text-sm flex-2">
              <p class="p-3 border-2 rounded-lg border-slate-700 mb-6">
                Бросаете курить?
                <br>
                Или только думаете об этом?
              </p>
              <p class="p-3 border-2 rounded-lg border-slate-700">
                Мы поможем вам расстатья с этой вредной привычной!
              </p>
            </div>
            <div class="flex flex-col justify-between">
              <div class="min-h-[80px] flex items-center">
                <Link
                    :href="route('register')"
                    class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                  Войти в аккаунт
                </Link
                >
              </div>
              <div class="arrow_1-animation flex flex-col items-center relative top-5">
                <svg width="25" height="15" viewBox="0 0 25 15" fill="#FDFDFD" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M23.5544 1.38298C24.2318 2.06029 24.2318 3.15845 23.5544 3.83576L13.7264 13.6638C13.0491 14.3411 11.9509 14.3411 11.2736 13.6638L1.44548 3.83576C0.768173 3.15845 0.768173 2.06029 1.44548 1.38298C2.12279 0.705673 3.22095 0.705673 3.89826 1.38298L12.5 9.98472L21.1018 1.38298C21.7791 0.705673 22.8771 0.705673 23.5544 1.38298Z"/>
                </svg>
                <svg width="25" height="15" viewBox="0 0 25 15" fill="#4E586C" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M23.5544 1.38298C24.2318 2.06029 24.2318 3.15845 23.5544 3.83576L13.7264 13.6638C13.0491 14.3411 11.9509 14.3411 11.2736 13.6638L1.44548 3.83576C0.768173 3.15845 0.768173 2.06029 1.44548 1.38298C2.12279 0.705673 3.22095 0.705673 3.89826 1.38298L12.5 9.98472L21.1018 1.38298C21.7791 0.705673 22.8771 0.705673 23.5544 1.38298Z"/>
                </svg>
                <svg width="25" height="15" viewBox="0 0 25 15" fill="#222B3E" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M23.5544 1.38298C24.2318 2.06029 24.2318 3.15845 23.5544 3.83576L13.7264 13.6638C13.0491 14.3411 11.9509 14.3411 11.2736 13.6638L1.44548 3.83576C0.768173 3.15845 0.768173 2.06029 1.44548 1.38298C2.12279 0.705673 3.22095 0.705673 3.89826 1.38298L12.5 9.98472L21.1018 1.38298C21.7791 0.705673 22.8771 0.705673 23.5544 1.38298Z"/>
                </svg>
              </div>
            </div>
            <div class="max-w-[300px] flex items-center justify-center flex-auto">
              <Image class="w-[200px]" path="storage/welcome_page/1.png"></Image>
            </div>
          </div>
        </div>
      </div>
      <div class="wrapper-content flex items-center">
        <div class="flex-1 max-w-[550px]">
          <h3 class="text-slate-500 font-bold text-3xl  mb-[50px]">
            Отслеживай свой прогресс
          </h3>
          <div class="px-10">
            <div class="max-w-[500px] flex justify-between items-center">
              <div class="max-w-xs">
                <p class="p-3 border-2 rounded-lg border-slate-700 text-sm">
                  Благодаря удобным диаграммам,
                  вы можете следить за своим прогрессом
                </p>
              </div>
              <div class="pr-4">
                <Image class="max-w-[100px] relative top-[-10px]" path="storage/welcome_page/2.png"></Image>
              </div>
            </div>
          </div>
        </div>
        <div>
          <svg width="16" height="90" viewBox="0 0 16 101" fill="#414856" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.2929 100.707C7.68342 101.098 8.31659 101.098 8.70711 100.707L15.0711 94.3431C15.4616 93.9526 15.4616 93.3195 15.0711 92.9289C14.6805 92.5384 14.0474 92.5384 13.6569 92.9289L8 98.5858L2.34315 92.9289C1.95263 92.5384 1.31946 92.5384 0.928936 92.9289C0.538412 93.3195 0.538412 93.9526 0.928936 94.3431L7.2929 100.707ZM7 4.37114e-08L7 100L9 100L9 -4.37114e-08L7 4.37114e-08Z"/>
          </svg>
        </div>
      </div>
      <div class="wrapper-content flex items-center flex-row-reverse pt-[100px]">
        <div class="flex-1 max-w-[512px]">
          <h3 class="text-slate-500 font-bold text-3xl  mb-[50px]">
            Веди личный дневник
          </h3>
          <div class="px-5">
            <div class="max-w-[500px] flex justify-between items-center">
              <div class="max-w-xs pl-6">
                <p class="p-3 border-2 rounded-lg border-slate-700 text-sm mb-5">
                  В дневнике, вы можете оставлять записи о поводах бросить и начать курить, так же вести записи своего самочувствия
                </p>
                <p class="p-3 border-2 rounded-lg border-slate-700 text-sm">
                  Ведя такие записи, оставить
                  вредную привычку в прошлом проще!
                </p>
              </div>
              <div class="pr-4">
                <Image class="max-w-[100px] relative top-[-10px]" path="storage/welcome_page/3.png"></Image>
              </div>
            </div>
          </div>
        </div>
        <div class="mr-[20px] relative top-[40px]">
          <svg width="16" height="90" viewBox="0 0 16 101" fill="#414856" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.2929 100.707C7.68342 101.098 8.31659 101.098 8.70711 100.707L15.0711 94.3431C15.4616 93.9526 15.4616 93.3195 15.0711 92.9289C14.6805 92.5384 14.0474 92.5384 13.6569 92.9289L8 98.5858L2.34315 92.9289C1.95263 92.5384 1.31946 92.5384 0.928936 92.9289C0.538412 93.3195 0.538412 93.9526 0.928936 94.3431L7.2929 100.707ZM7 4.37114e-08L7 100L9 100L9 -4.37114e-08L7 4.37114e-08Z"/>
          </svg>
        </div>
      </div>
      <div class="wrapper-content flex items-center">
        <div class="flex-1 max-w-[550px] pt-[100px]">
          <h3 class="text-slate-500 font-bold text-3xl  mb-[50px]">
            Получай достижения
          </h3>
          <div class="px-10">
            <div class="max-w-[500px] flex justify-between items-center">
              <div class="max-w-xs">
                <p class="p-3 border-2 rounded-lg border-slate-700 text-sm">
                  За дни без курения вы будете получать достижения и сможете открывать новые возможности приложения
                </p>
                <p class="p-3 text-sm text-slate-600">
                  Например, рамку для иконки аватара, разновидности отчетов, виды дизайна приложения и прочее
                </p>
              </div>
              <div class="pr-4">
                <Image class="max-w-[100px] relative top-[-10px]" path="storage/welcome_page/4.png"></Image>
              </div>
            </div>
          </div>
        </div>
        <div class="relative top-[100px]">
          <svg width="16" height="90" viewBox="0 0 16 101" fill="#414856" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.2929 100.707C7.68342 101.098 8.31659 101.098 8.70711 100.707L15.0711 94.3431C15.4616 93.9526 15.4616 93.3195 15.0711 92.9289C14.6805 92.5384 14.0474 92.5384 13.6569 92.9289L8 98.5858L2.34315 92.9289C1.95263 92.5384 1.31946 92.5384 0.928936 92.9289C0.538412 93.3195 0.538412 93.9526 0.928936 94.3431L7.2929 100.707ZM7 4.37114e-08L7 100L9 100L9 -4.37114e-08L7 4.37114e-08Z"/>
          </svg>
        </div>
      </div>
      <div class="wrapper-content px-7 pt-[100px] flex items-center justify-between">
        <div>
          <Image class="max-w-[150px]" path="storage/welcome_page/5.png"></Image>
        </div>
        <p class="max-w-xl text-center text-slate-500 text-3xl font-bold">
          Начни новый образ жизни
          с небольшого шага
        </p>
        <div class="flex justify-center items-center">
            <Link :href="route('dashboard')"
            class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            >
              Приступить
            </Link>
        </div>
        </div>
      </div>
</template>

<style>
.wrapper-content {
  max-width: 1100px;
  margin: 0 auto;
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

</style>
