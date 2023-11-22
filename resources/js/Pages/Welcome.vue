<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Image from "@/Components/Image.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});


</script>

<template>
    <Head title="None Smoke" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-gray-100 dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Главная</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Войти</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Зарегистрироваться</Link
                >
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <div class="flex-auto flex justify-center items-center">
                    <ApplicationLogo class="w-1/6 h-1/1"></ApplicationLogo>
                </div>
            </div>

            <div class="mt-16">
                <div
                    class="scale-100 p-6 bg-white mb-10 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                >
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                            None Smoke
                            <span class="text-xl text-gray-400">
                                - Оставь привычку курить позади!
                            </span>
                        </h2>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01]  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                    >
                        <div>
                            <div class="flex justify-between">
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Отслеживай свой прогресс</h2>

                                <div
                                    class="h-20 w-20 p-1 bg-red-50 dark:bg-purple-700/20 flex items-center justify-center rounded-full"
                                >
                                    <Image path="storage/welcome_1.png" text-alt="Img Welcome 1"></Image>
                                </div>
                            </div>
                            <p class="mt-5 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Благодаря удобным диаграммам и простой статистики, вы можете отслеживать свой прогресс, следить за нормами, а наши алгоритмы подскажут возможные риски ломки
                            </p>
                        </div>
                    </div>

                    <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                    >
                        <div>
                            <div class="flex justify-between">
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Веди личный дневник</h2>

                                <div
                                class="h-20 w-20 bg-red-50 dark:bg-purple-700/20 flex items-center justify-center rounded-full"
                            >
                                <Image path="storage/welcome_2.png" text-alt="Img Welcome 1"></Image>
                            </div>
                            </div>
                            <p class="mt-8 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                В дневнике вы можете оставлять записи о причине курения, поводов бросить и начать курить, так же вести записи своего самочувствия.
                                Ведя такие записи, оставить вредную привычку в прошлом проще!
                            </p>
                        </div>
                    </div>

                    <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                    >
                        <div>
                            <div class="flex justify-between">
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Получай достижения</h2>

                                <div
                                    class="h-16 w-16 p-3 bg-red-50 dark:bg-purple-700/20 flex items-center justify-center rounded-full"
                                >
                                    <Image path="storage/image/welcome_1.png" text-alt="Img Welcome 1"></Image>
                                </div>
                            </div>
                            <p class="mt-8 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                              За дни вашего воздержания вы будете получать достижения и сможете открывать новые возможности приложения (например, рамку для иконки аватара, разновидности отчетов, виды дизайна приложения и прочее)
                            </p>
                        </div>
                    </div>

                    <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                    >
                        <div>
                            <div class="flex justify-between">
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Отслеживай свой прогресс</h2>

                                <div
                                    class="h-16 w-16 p-3 bg-red-50 dark:bg-purple-700/20 flex items-center justify-center rounded-full"
                                >
                                    <Image path="storage/image/welcome_1.png" text-alt="Img Welcome 1"></Image>
                                </div>
                            </div>
                            <p class="mt-8 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Благодаря удобным диаграммам и простой статистики ты можешь отслеживать свой прогресс, ставить перед собой задачи и цели, достигая их
                                ты будешь всё ближе к свободе от вредной привычке
                            </p>
                        </div>
                    </div>
                </div>
              <div class="mt-16 flex justify-center">
                  <Link :href="route('dashboard')"
                  class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                  >
                    Приступить
                  </Link>
              </div>
            </div>
        </div>
      </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
