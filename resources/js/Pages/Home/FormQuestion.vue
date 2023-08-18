<script setup>
    import {ref} from "vue";
    import FormQuestionVape from "@/Pages/Home/FormQuestionVape.vue";
    import FormQuestionCigarette from "@/Pages/Home/FormQuestionCigarette.vue";

    let typeForm = ref(0);
</script>

<template>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h3 class="mb-5 text-2xl text-">Для начала заполним формы</h3>
        <div class="mb-4" v-if="typeForm === 0">
            <h4 class="text-lg mb-4">
                Какого типа сигарет вы курили?
            </h4>
            <div class="max-w-xl flex justify-between m-auto">
                <div @click="typeForm = 1" class="py-6 px-16 bg-gray-600 rounded-lg cursor-pointer duration-300 hover:scale-105">
                    Электронные
                </div>
                <div @click="typeForm = 2" class="py-6 px-16 bg-gray-600 rounded-lg cursor-pointer duration-300 hover:scale-105">
                    Табачные
                </div>
            </div>
        </div>
        <div v-if="typeForm === 1">
            <FormQuestionVape></FormQuestionVape>
        </div>
        <div v-if="typeForm === 2">
            <FormQuestionCigarette></FormQuestionCigarette>
        </div>
    </div>
</template>
