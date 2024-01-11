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
    <div class="m-auto flex justify-center items-center flex-col">
        <div class="form_type_1 max-w-6xl flex-auto grid grid-cols-3 justify-center">
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
            <div class="form_input m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько стоила банка жидкости?</div>
                <div class="">
                    <input  v-model="priceJar" class="bg-gray-700 rounded p-3" type="number" maxlength="4">
                    <span class="ml-2">
                        руб.
                    </span>
                </div>
            </div>
            <div class="form_input m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько банок в месяц вы покупаете?</div>
                <div class="">
                    <input  v-model="countJar" class="bg-gray-700 rounded p-3" type="number" maxlength="2">
                    <span class="ml-2">
                        штук
                    </span>
                </div>
            </div>
            <div class="form_input m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько стоит испаритель?</div>
                <div class="">
                    <input  v-model="priceCart" class="bg-gray-700 rounded p-3" type="number" maxlength="4">
                    <span class="ml-2">
                        руб.
                    </span>
                </div>
            </div>
            <div class="form_input m-3 flex flex-col justify-center">
                <div class="mb-3">Сколько испарителей в месяц вы покупаете?</div>
                <div class="">
                    <input  v-model="countCart" class="bg-gray-700 rounded p-3" type="number" maxlength="3">
                    <span class="ml-2">
                        шт.
                    </span>
                </div>
            </div>
        </div>
        <div class="button m-3 mt-10 justify-end">
          <button @click.prevent="sendData" type="submit" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Отправить
          </button>
        </div>
    </div>
</template>

<style>

@media (max-width: 900px) {
    .form_type_1 {
      grid-template-columns: 290px 290px;
    }
}

@media (max-width: 610px) {
  .form {
    grid-template-columns: 1fr;
  }

  .form_input input {
    width: 80%;
  }
}

</style>