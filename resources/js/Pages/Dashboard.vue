<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import FormQuestion from "@/Pages/Home/FormQuestion.vue";
import {onMounted, ref} from "vue";
import StructurePanel from "@/Pages/Home/StructurePanel.vue";
import GoalPanel from "@/Pages/Home/GoalPanel.vue";
import DiaryPanel from "@/Pages/Diary/DiaryPanel.vue";
import Image from "@/Components/Image.vue";
import MotivationPanel from "@/Pages/Home/MotivationPanel.vue";

const props = defineProps([
    'basicInfoSmoke',
    'lastDiaryRecord',
    'goalsUser',
]);

let viewForms = props.basicInfoSmoke !== false ? ref(false) : ref(true);
let viewFormAddRecordDiary = props.lastDiaryRecord.daysFromAddedRecord > 3 || props.lastDiaryRecord.daysFromAddedRecord === null ? ref(true) : ref(false);

console.log(props.lastDiaryRecord.daysFromAddedRecord);

</script>

<template>
    <Head title="Главная" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex">
              <Image class="mr-2 relative w-[22px] h-[22px]" path="storage/icons/home_icon.png"></Image>
              <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Главная</h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="overflow-hidden shadow-sm sm:rounded-lg mb-8">
                    <FormQuestion v-if="viewForms === true" :viewForms="viewForms"></FormQuestion>
                    <StructurePanel v-else-if="viewForms === false" :basicInfoSmoke="basicInfoSmoke"></StructurePanel>
                </div>
                <div v-if="viewForms === false" class="overflow-hidden shadow-sm sm:rounded-lg">
                  <MotivationPanel></MotivationPanel>
                  <div v-if="viewFormAddRecordDiary === true" class="overflow-hidden shadow-sm mb-8 flex justify-center">
                    <DiaryPanel class="width_component w-2/4 bg-gray-800 rounded-lg"></DiaryPanel>
                  </div>
                  <GoalPanel :basicInfoSmoke="basicInfoSmoke" :goalsUser="goalsUser"></GoalPanel>
                </div>
            </div>
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          </div>
        </div>
    </AuthenticatedLayout>
</template>


<style>
@media (max-width: 870px) {
  .width_component {
    width: 80%;
  }
}

</style>