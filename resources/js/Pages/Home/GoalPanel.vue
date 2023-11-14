<script setup>
  import GoalEdit from "@/Pages/Home/GoalEdit.vue";
  import {ref} from "vue";

  const props = defineProps(['basicInfoSmoke', 'goalsUser'])

  const viewStringNoneGoal = props.goalsUser === false;
  const viewGoalEdit = ref(false);
  let goalIsSucceed = ref(false);

  function getWidthForGoal(price, goal) {
    let percent = Math.floor(price / goal * 100);
    goalIsSucceed.value = false;

    if (percent >= 100) {
      percent = 100;
      goalIsSucceed.value = true;
    }
    else if (percent <= 0) {
      percent = 0.5
    }

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
          <div v-else class="m-4 block p-5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" v-for="item in goalsUser">
            <div class="max-w-4xl  text-white flex justify-between">
              <div class="mb-2">
                {{ item.name }}
              </div>
              <div>
                Цель:
                <span class="text-stone-400">
                  {{ item.price }}руб.
                </span>
              </div>
            </div>
            <div :style="getWidthForGoal(basicInfoSmoke['money_saving'], item.price)">
              <div v-if="goalIsSucceed === false" class="mt-1 h-1 rounded-md bg-gradient-to-r from-indigo-800 to-indigo-400"></div>
              <div v-else class="mt-1 h-1 rounded-md bg-gradient-to-r from-green-900 to-green-400"></div>
            </div>
          </div>
        </div>
        <div class="text-white pt-12 mt-4">
          <button v-on:click="viewGoalEdit = true" v-if="!viewGoalEdit" class="px-4 py-2 bg-violet-900/80 rounded-lg border-violet-700 border-2">
            Поставить цель
          </button>
        </div>
    </div>
    <GoalEdit :viewGoalEdit="viewGoalEdit" v-if="viewGoalEdit"></GoalEdit>
  </div>
</template>

<style scoped>

</style>