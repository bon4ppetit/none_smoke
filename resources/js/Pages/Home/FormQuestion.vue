<script setup>
    import {ref} from "vue";
    import FormQuestionVape from "@/Pages/Home/FormQuestionVape.vue";
    import FormQuestionCigarette from "@/Pages/Home/FormQuestionCigarette.vue";

    let typeForm = ref(0);
</script>

<template>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h3 class="mb-5 text-2xl text-">Для начала заполним форму</h3>
        <div class="mb-4" v-if="typeForm === 0">
            <h4 class="text-lg mb-4">
                Какого типа сигарет вы курили?
            </h4>
            <div class="max-w-xl flex justify-between m-auto">
                <div @click="typeForm = 1" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-12 cursor-pointer py-6 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Электронные
                </div>
                <div @click="typeForm = 2" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-12 cursor-pointer py-6 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Табачные
                </div>
            </div>
        </div>
        <div v-if="typeForm === 1">
            <FormQuestionVape :type_smoke=typeForm></FormQuestionVape>
        </div>
        <div v-if="typeForm === 2">
            <FormQuestionCigarette :type_smoke=typeForm></FormQuestionCigarette>
        </div>
    </div>
</template>
