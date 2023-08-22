<script setup>
  import GoalEdit from "@/Pages/Home/GoalEdit.vue";
  import {ref} from "vue";

  const props = defineProps(['basicInfoSmoke', 'goalsUser'])

  const viewStringNoneGoal = props.goalsUser === false;
  const viewGoalEdit = ref(false);

  function getWidthForGoal(price, goal) {
    let percent = Math.floor(price / goal * 100);

    if (percent >= 100)
      percent = 100;
    else if (percent <= 0)
      percent = 0.5

    console.log(percent);

    return 'width: ' + percent + "%"
  }
</script>

<template>
  <div class="p-5">
    <div class="flex justify-between">
        <div class="max-w-4xl flex-auto">
          <h2 class="text-white font-bold text-2xl flex">
            Ваша копилка:
            <span class="font-bold text-violet-700 block ml-3">
              {{basicInfoSmoke['money_saving']}}руб.
            </span>
          </h2>
          <span class="text-zinc-400 text-center text-sm" v-if="viewStringNoneGoal">
            У вас ещё нету цели для накопления. <br>Советуем поставьте её, чтобы накопленные деньги потратились не даром.
          </span>
          <div v-else class="mb-4" v-for="item in goalsUser">
            <div class="max-w-4xl  text-white flex justify-between">
              <div>
                {{ item.name }}
              </div>
              <div>
                {{ item.price }}руб.
              </div>
            </div>
            <div :style="getWidthForGoal(basicInfoSmoke['money_saving'], item.price)">
              <div class="mt-1 h-1 rounded-md bg-gradient-to-r from-indigo-800 to-indigo-400"></div>
            </div>
          </div>
        </div>
        <div class="text-white flex-auto flex items-center justify-center">
          <button v-on:click="viewGoalEdit = true" v-if="!viewGoalEdit" class="px-4 py-2 bg-violet-900/80 rounded-lg border-violet-700 border-2">
            Поставить цель
          </button>
        </div>
    </div>
    <GoalEdit v-if="viewGoalEdit"></GoalEdit>
  </div>
</template>

<style scoped>

</style>