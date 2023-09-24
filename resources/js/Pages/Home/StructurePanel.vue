<script setup>

const props = defineProps([
  'basicInfoSmoke',
]);

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
  <div class="max-w-3xl m-auto p-6 text-gray-900 dark:text-gray-100">
    <div class="flex flex-col items-center mb-4">
          <span class="text-5xl font-bold text-violet-700 block">
              {{ basicInfoSmoke['day_dont_smoke'] }}
              <span class="text-3xl">
                  дней
              </span>
          </span>
      <span class="text-zinc-400 text-center text-sm">
                Вы не курите
            </span>
    </div>
    <div class="flex justify-between">
      <div class="flex flex-col items-center mb-4">
                <span class="text-3xl font-bold text-violet-700 block">
                    {{ basicInfoSmoke['money_saving'] }}
                    <span class="text-3xl">
                        руб.
                    </span>
                </span>
        <span class="text-zinc-400 text-center text-sm">
                    Вы сэкономили
                </span>
      </div>
      <div class="flex flex-col justify-center items-center mb-4">
        <button @click="destroyProgress"
                class="text-red-500 bg-red-900/80 px-3 py-2 rounded-lg border-2 border-red-600">
          Сбросить
          <br>
          статистику
        </button>
      </div>
      <div class="flex flex-col items-center mb-4">
            <span class="text-3xl font-bold text-violet-700 block">
                {{ basicInfoSmoke['money_spend'] }}
                <span class="text-3xl">
                    руб.
                </span>
            </span>
        <span class="text-zinc-400 text-center text-sm">
                Вы потратили <br>
                (за время курения)
            </span>
      </div>
    </div>
  </div>
</template>
