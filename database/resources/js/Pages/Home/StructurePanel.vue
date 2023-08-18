<script setup>
    let userData = defineProps([
        'basicInfoSmoke'
    ])
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
