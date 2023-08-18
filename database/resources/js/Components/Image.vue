<script setup>
    const props = defineProps({
        path: {
            type: String
        },
        textAlt: {
            type: String
        }
    })

    import { ref } from "vue";
    import axios from "axios";

    let loading = ref();
    let image = ref();
    let error = ref();

    async function getImage(path) {
        try {
            loading.value = true;

            const resp = await axios.get(route("image.basic_icon", {
                path: path
            }))

            image.value = resp.data;
        } catch {
            error.value = true;
        } finally {
            loading.value = false;
        }
    }


    getImage(props.path);

</script>

<template>
    <img :src="image" :alt="textAlt">
</template>

<style scoped>

</style>
