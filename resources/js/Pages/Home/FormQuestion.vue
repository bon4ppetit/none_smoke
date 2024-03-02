<script setup>
    import {ref} from "vue";
    import FormQuestionVape from "@/Pages/Home/FormQuestionVape.vue";
    import FormQuestionCigarette from "@/Pages/Home/FormQuestionCigarette.vue";

    let typeForm = ref(0);
</script>

<template>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <div class="max-w-3xl text-center m-auto mb-5 border rounded-lg py-6 px-12 bg-gray-800 border-gray-600">
            Обычно люди удивляются тому, на сколько же оказывается легко бросить курить. Ведь перед таким эксперементом, им казалось что это невозможно.
            Но по опросам людей у которых получилось бросить такую вредную привычку, 17 из 18 курильщиков не думали что будет на столько просто.
            Здесь мы тебе предлагаем поучавстовать в маленьком, но важном для твоего здоровья эксперементе - бросить курить.
        </div>
        <h3 class="mb-5 text-2xl font-bold">
          Для начала заполним форму
        </h3>
        <div class="max-w-4xl m-auto mb-4" v-if="typeForm === 0">
            <h4 class="text-lg mb-4">
                Какого типа сигарет вы курили?
            </h4>
            <div class="block_buttons max-w-xl flex justify-between m-auto">
                <div @click="typeForm = 1" class="border focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-12 cursor-pointer py-6 me-2 mb-2 bg-gray-800 text-white border-gray-600 hover:bg-gray-700 hover:border-gray-600 focus:ring-gray-700">
                    Электронные
                </div>
                <div @click="typeForm = 2" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-12 cursor-pointer py-6 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Табачные
                </div>
            </div>
        </div>
        <FormQuestionVape v-if="typeForm === 1" :type_smoke=typeForm></FormQuestionVape>
        <FormQuestionCigarette v-if="typeForm === 2" :type_smoke=typeForm></FormQuestionCigarette>
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