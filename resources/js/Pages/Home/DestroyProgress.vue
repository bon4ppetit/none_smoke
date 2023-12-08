<script setup>
function destroyProgress() {
  axios.delete(route('progress.destroy'))
      .then((resp) => {
        if (resp.data['status'] === 'success')
          window.location.reload();
        else if (resp.data['status'] === 'error')
          console.log(resp.data)
      })
      .catch((err) => {
        console.log(err.data)
      })
}
</script>

<template>
  <div class="px-12 py-6 flex flex-col items-center h-96 justify-center">
    <h2 class="text-red-500 text-2xl font-bold pb-8">
      Предупреждение!
    </h2>
    <p class="text-white pb-8 text-center">
      Счёт ваших дней будет обнулен. <br> Подтвердите действие
    </p>
    <button @click="destroyProgress" class="text-red-500 bg-red-900/80 px-3 py-2 rounded-lg border-2 border-red-600">
      Подтвердить
    </button>
  </div>
</template>

<style scoped>

</style>