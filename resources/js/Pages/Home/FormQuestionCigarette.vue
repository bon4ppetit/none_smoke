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
        .then((res) => {
          // console.log(res.data)
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
    <div class="m-auto flex justify-center items-center">
        <div class="max-w-6xl flex-auto grid grid-cols-3 justify-center">
          <div class="m-3 flex flex-col justify-center">
            <div class="mb-3">Когда вы начали курить?</div>
            <div class="">
              <input v-model="date_start_smoke" class="bg-gray-700 rounded p-3" type="date">
            </div>
          </div>
          <div class="m-3 flex flex-col justify-center">
            <div class="mb-3">Когда вы решили бросить курить?</div>
            <div class="">
              <input  v-model="date_end_smoke" class="bg-gray-700 rounded p-3" type="date">
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
                    <span class="ml-2">
                        руб.
                    </span>
                </div>
            </div>
            <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько никотина в сигарете?</div>
                <div class="">
                    <input class="bg-gray-700 rounded p-3" type="number" v-model="nicotine">
                    <span class="ml-2">
                        шт.
                    </span>
                </div>
            </div>
            <div class="m-3 mt-8">
                <button @click.prevent="sendData" type="submit" class="px-12 py-4 min-h-min bg-violet-800 rounded-lg">
                    Отправить
                </button>
            </div>
        </div>
    </div>
</template>
