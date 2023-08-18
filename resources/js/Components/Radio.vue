<script setup>
    const props = defineProps({
       name: {
           default: null
       }
    });
</script>

<template>
    <input
        :name="name"
        type="radio"
    >
</template>

<style scoped>

</style>
