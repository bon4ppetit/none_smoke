<script setup>
    import {ref} from "vue";

    let date_start_smoke = ref();
    let date_end_smoke = ref();
    let pricePack = ref();
    let countCigInPack = ref();
    let countSmokeInDay = ref();
    let nicotine = ref();

    function sendData() {
      axios.post(route('profile.statistic.store'), {
        type_smoke: 'cigarette',
        date_start_smoke: date_start_smoke.value,
        date_finish_smoke: date_end_smoke.value,
        money_on_pack_cigarette: pricePack.value,
        count_cigarettes_in_pack: countCigInPack.value,
        count_smoke_cigarettes_a_day: countSmokeInDay.value,
        nicotine_in_cigarette: nicotine.value,
      })
          .then(() => {
            window.location.reload()
          })
          .catch((error) => {
            if (error.code === "ERR_BAD_REQUEST") {
              alert('Введеные данные невалидны, пожалуйста, проверьте поля');
            }
          })
    }
</script>

<template>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h3 class="mb-5 text-2xl font-bold">
          Для начала заполним форму
        </h3>
        <div>
          <div class="m-auto flex justify-center items-center flex-col">
            <div class="form_type_2 max-w-6xl flex-auto grid grid-cols-3 justify-center">
              <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Когда вы начали курить?</div>
                <div class="">
                  <input v-model="date_start_smoke" class="bg-gray-700 rounded p-3" type="date">
                </div>
              </div>
              <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Когда вы решили бросить курить?</div>
                <div class="">
                  <input class="bg-gray-700 rounded p-3" type="date" v-model="date_end_smoke">
                </div>
              </div>
              <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько стоила упаковка сигарет?</div>
                <div class="">
                  <input class="bg-gray-700 rounded p-3" type="number" v-model="pricePack">
                  <span class="ml-2">
                        руб.
                    </span>
                </div>
              </div>
              <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько сигарет в упаковке?</div>
                <div class="">
                  <input class="bg-gray-700 rounded p-3" type="number" v-model="countCigInPack">
                  <span class="ml-2">
                        штук
                    </span>
                </div>
              </div>
              <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько сигарет в день вы курили?</div>
                <div class="">
                  <input class="bg-gray-700 rounded p-3" type="number" v-model="countSmokeInDay">
                </div>
              </div>
              <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько никотина в сигарете?</div>
                <div class="">
                  <input class="bg-gray-700 rounded p-3" type="number" v-model="nicotine">
                  <span class="ml-2">
                        мг
                    </span>
                </div>
              </div>
            </div>
            <div class="m-3 mt-8">
              <button @click.prevent="sendData" type="submit" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Отправить
              </button>
            </div>
          </div>
          <div class="max-w-3xl text-center m-auto mb-5 border rounded-lg py-6 px-12 bg-gray-800 border-gray-600">
            Обычно люди удивляются тому, на сколько же оказывается легко бросить курить. Ведь перед таким эксперементом, им казалось что это невозможно.
            Но по опросам людей у которых получилось бросить такую вредную привычку, 17 из 18 курильщиков не думали что будет на столько просто.
            Здесь мы тебе предлагаем поучавстовать в маленьком, но важном для твоего здоровья эксперементе - бросить курить.
          </div>
        </div>
    </div>
</template>

<style>
@media (max-width: 800px) {
  .block_buttons {
    max-width: 450px;
  }
}

@media (max-width: 425px) {
  .block_buttons {
    display: flex;
    flex-direction: column;
  }
}
</style>