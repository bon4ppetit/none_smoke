<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-5 pt-1 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-100 dark:hover:text-gray-100 hover:border-gray-300 dark:hover:border-gray-700  dark:focus:text-gray-100 transition duration-150 ease-in-out'
);

const classesTextLink = computed(() =>
    props.active
        ? 'px-4 py-2 bg-violet-900/80 rounded-lg border-violet-700 border-2'
        : 'px-4 py-2'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <div :class="classesTextLink">
            <slot />
        </div>
    </Link>
</template>












