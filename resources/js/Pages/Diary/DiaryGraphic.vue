<script setup>
import { Bar } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

const props = defineProps([
  'masks',
]);


let xData = [];
let yData = [];

props.masks.forEach((x) => {
  xData.push(x.created_at);
  yData.push(x.wish_vape.status);
})

let chartData = {
      labels: xData,
      datasets: [{
        data: yData,
        fill: true,
        label: "Уровень вашего желания курить",
        backgroundColor: ['#6f1db5'],
        borderRadius: '5',
      }]
  };

let chartOptions = {
  responsive: true
}


</script>

<template>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg mb-8">
      <div class="px-6 py-2 flex justify-between">
        <h3 class="flex items-center text-2xl font-bold text-slate-500">
          Статистика курения:
        </h3>
      </div>
      <div class="w-full">
        <div class="max-h-[400px]">
          <Bar
              id="my-chart-id"
              :options="chartOptions"
              :data="chartData"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>