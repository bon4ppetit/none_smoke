<script setup>
    import { Head } from '@inertiajs/vue3';
    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<template>
    <Head ><title>Достижения</title></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semi-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Достижения
            </h2>
        </template>
    </AuthenticatedLayout>
</template>

