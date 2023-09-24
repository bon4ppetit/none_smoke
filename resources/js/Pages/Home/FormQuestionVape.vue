<script setup>
    import {ref} from "vue";

    let date_start_smoke = ref();
    let date_finish_smoke = ref();
    let priceJar = ref();
    let countJar = ref();
    let priceCart = ref();
    let countCart = ref();

    function sendData() {
        axios.post(route('profile.statistic.store'), {
            type_smoke: 'vape',
            date_start_smoke: date_start_smoke.value,
            date_finish_smoke: date_finish_smoke.value,
            price_jar: priceJar.value,
            count_jar_a_month: countJar.value,
            price_vape_vaporizer: priceCart.value,
            count_vape_vaporizer_a_month: countCart.value,
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
    <div class="m-auto flex justify-center items-center">
        <div class="max-w-6xl flex-auto grid grid-cols-3 justify-center">
            <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Когда вы начали парить?</div>
                <div class="">
                    <input v-model="date_start_smoke" class="bg-gray-700 rounded p-3" type="date">
                </div>
            </div>
            <div class="m-3 flex flex-col justify-center">
              <div class="mb-3">Когда вы решили бросить парить?</div>
              <div class="">
                <input  v-model="date_finish_smoke" class="bg-gray-700 rounded p-3" type="date">
              </div>
            </div>
            <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько стоила банка жидкости?</div>
                <div class="">
                    <input  v-model="priceJar" class="bg-gray-700 rounded p-3" type="number" maxlength="4">
                    <span class="ml-2">
                        руб.
                    </span>
                </div>
            </div>
            <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько банок в месяц вы покупаете?</div>
                <div class="">
                    <input  v-model="countJar" class="bg-gray-700 rounded p-3" type="number" maxlength="2">
                    <span class="ml-2">
                        штук
                    </span>
                </div>
            </div>
            <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько стоит испаритель?</div>
                <div class="">
                    <input  v-model="priceCart" class="bg-gray-700 rounded p-3" type="number" maxlength="4">
                    <span class="ml-2">
                        руб.
                    </span>
                </div>
            </div>
            <div class="m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько испарителей в месяц вы покупаете?</div>
                <div class="">
                    <input  v-model="countCart" class="bg-gray-700 rounded p-3" type="number" maxlength="3">
                    <span class="ml-2">
                        шт.
                    </span>
                </div>
            </div>
            <div class="m-3 mt-10">
                <button @click.prevent="sendData" type="submit" class="px-12 py-4 min-h-min bg-violet-800 rounded-lg">
                    Отправить
                </button>
            </div>
        </div>
    </div>
</template>
