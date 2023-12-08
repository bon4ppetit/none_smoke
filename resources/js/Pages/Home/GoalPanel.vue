<script setup>
  import GoalEdit from "@/Pages/Home/GoalEdit.vue";
  import {ref} from "vue";
  import Modal from "@/Components/Modal.vue";

  const props = defineProps(['basicInfoSmoke', 'goalsUser'])

  const viewStringNoneGoal = props.goalsUser === false;
  const viewGoalEdit = ref(false);
  let goalIsSucceed = ref(false);
  let confirmDeleteButton = ref(false);

  function viewDeleteButton(idGoal) {
    let elem = document.getElementById(idGoal).childNodes[1];
    document.getElementById(idGoal).childNodes[0].classList.add('animation_goal_content');
    setTimeout(() => {
      elem.classList.toggle('hidden');
      document.getElementById(idGoal).childNodes[0].classList.remove('animation_goal_content');
    }, 600)
  }

  function deleteGoal(id) {
    axios.post(route('goal.destroy'), {
      id: id
    }).then((res) => {
      window.location.reload();
    }).catch((res) => {
      console.log(res.data)
    })
  }

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
        <div class="flex-auto">
          <div class="flex justify-between">
            <h2 class="text-white font-bold text-2xl flex">
              Ваша копилка:
              <span class="font-bold text-gray-400 block ml-3">
              {{basicInfoSmoke['money_saving']}}руб.
            </span>
            </h2>
            <div class="text-white">
              <button v-on:click="viewGoalEdit = true" class="px-4 py-2 bg-violet-900/80 rounded-lg border-violet-700 border-2">
                Поставить цель
              </button>
            </div>
          </div>
          <span class="text-zinc-400 text-center text-sm" v-if="viewStringNoneGoal">
            У вас ещё нету цели для накопления. <br>Советуем поставьте её, чтобы накопленные деньги потратились не даром.
          </span>
          <div v-else class="m-4">
            <h4 class="text-white">
              Цели:
            </h4>
            <div v-for="item in goalsUser" :id="item.id" class="flex items-center justify-between my-4">
              <div @click="viewDeleteButton(item.id)" class="w-full mr-6 duration-700 h-20 flex flex-col justify-center px-6 cursor-pointer border border-gray-200 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="text-white flex justify-between">
                  <div class="mb-2">
                    {{ item.name }}
                  </div>
                  <div class="text-stone-400">
                    {{ item.price }}руб.
                  </div>
                </div>
                <div :style="getWidthForGoal(basicInfoSmoke['money_saving'], item.price)">
                  <div v-if="goalIsSucceed === false" class="mt-1 h-1 rounded-md bg-gradient-to-r from-indigo-800 to-indigo-400"></div>
                  <div v-else class="mt-1 h-1 rounded-md bg-gradient-to-r from-green-900 to-green-400"></div>
                </div>
              </div>
              <div class="relative hidden">
                <button v-if="!confirmDeleteButton" @click="confirmDeleteButton = true" class="text-red-500 bg-red-900/80 px-3 py-2 rounded-lg border-2 border-red-600">
                  Удалить
                </button>
                <button v-if="confirmDeleteButton" @click="deleteGoal(item.id)" class="text-red-500 bg-red-900/80 px-3 py-2 rounded-lg border-2 border-red-600">
                  Подтвердить
                </button>
              </div>
            </div>
          </div>
        </div>
    </div>
      <Modal :show="viewGoalEdit" v-on:close="viewGoalEdit = false">
        <GoalEdit></GoalEdit>
      </Modal>
  </div>
</template>

<style scoped>
  .animation_goal_content {
    width: 87%;
  }
</style>