<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import FormQuestion from "@/Pages/Home/FormQuestion.vue";
import {onMounted, ref} from "vue";
import StructurePanel from "@/Pages/Home/StructurePanel.vue";
import GoalPanel from "@/Pages/Home/GoalPanel.vue";
import DiaryPanel from "@/Pages/Diary/DiaryPanel.vue";
import Image from "@/Components/Image.vue";

const props = defineProps([
    'basicInfoSmoke',
    'lastDiaryRecord',
    'goalsUser',
]);

let viewForms = props.basicInfoSmoke !== false ? ref(false) : ref(true);
let viewFormAddRecordDiary = props.lastDiaryRecord.daysFromAddedRecord > 3 || props.lastDiaryRecord.daysFromAddedRecord === null ? ref(true) : ref(false);

</script>

<template>
    <Head title="Главная" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex">
              <Image class="mr-2 relative top-[-2px]" path="storage/icons/home_icon.svg"></Image>
              <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Главная</h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg mb-8">
                    <FormQuestion v-if="viewForms === true" :viewForms="viewForms"></FormQuestion>
                    <StructurePanel v-else-if="viewForms === false" :basicInfoSmoke="basicInfoSmoke"></StructurePanel>
                </div>
                <div v-if="viewForms === false && viewFormAddRecordDiary === true" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8 p-5">
                  <DiaryPanel class="w-2/4"></DiaryPanel>
                </div>
                <div class="overflow-hidden shadow-sm sm:rounded-lg mb-8" v-if="viewForms === false">
                  <GoalPanel :basicInfoSmoke="basicInfoSmoke" :goalsUser="goalsUser"></GoalPanel>
                </div>
            </div>
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          </div>
        </div>
    </AuthenticatedLayout>
</template>
