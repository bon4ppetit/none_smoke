<script setup>
  const props = defineProps(['basicInfoSmoke'])
</script>

<template>
  <div class="p-5 flex justify-between">
      <div>
        <h2 class="text-white font-bold text-2xl flex">
          Ваша копилка:
          <span class="font-bold text-violet-700 block ml-3">
            {{basicInfoSmoke['money_saving']}}руб.
          </span>
        </h2>
        <span class="text-zinc-400 text-center text-sm">
        У вас ещё нету цели для накопления. <br>Советуем поставьте её, чтобы накопленные деньги потратились не даром.
      </span>
      </div>
    <div class="text-white flex-auto flex items-center justify-center">
      <button class="px-4 py-2 bg-violet-900/80 rounded-lg border-violet-700 border-2">
        Поставить цель
      </button>
    </div>
  </div>
</template>

<style scoped>

</style>