<?php

use App\Http\Controllers\Image\GetImageController;
use App\Http\Controllers\Profile\Achieve\ViewAchievementsController;
use App\Http\Controllers\Profile\Goal\AddGoalController;
use App\Http\Controllers\Profile\Home\ViewHomeController;
use App\Http\Controllers\Profile\Statistic\AddCigaretteStatisticController;
use App\Http\Controllers\Profile\Statistic\AddVapeStatisticController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\API\ProgressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', ViewHomeController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('profile')->group(function () {
    Route::post('/statistic/vape', AddVapeStatisticController::class)->name('profile.statistic.add.vape');
    Route::post('/statistic/add/cigarette', AddCigaretteStatisticController::class)->name('profile.statistic.add.cigarette');
});

Route::get('image/basic_icon', GetImageController::class)->name('image.basic_icon');

Route::prefix('profile/achievement')->group(function () {
    Route::get('/', ViewAchievementsController::class)->name('achievement.home');
});

Route::prefix('profile')->group(function () {
    Route::post('/goal', AddGoalController::class)->name('goal.add');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('progress')->group(function () {
    Route::post('/destroy', [ProgressController::class, 'destroy'])->name('progress.destroy');
});

require __DIR__ . '/auth.php';
