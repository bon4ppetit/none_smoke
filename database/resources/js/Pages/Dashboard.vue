<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import FormQuestion from "@/Pages/Home/FormQuestion.vue";
    import {ref} from "vue";
    import StructurePanel from "@/Pages/Home/StructurePanel.vue";

    const props = defineProps([
        'basicInfoSmoke'
    ]);

    let viewForms = props.userStatistic !== false ? ref(false) : ref(true);
</script>

<template>
    <Head title="Главная" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Главная</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <FormQuestion v-if="viewForms === true" :viewForms="viewForms"></FormQuestion>
                    <StructurePanel v-else-if="viewForms === false" :userStatistic="userStatistic"></StructurePanel>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
