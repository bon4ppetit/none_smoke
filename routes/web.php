<?php

use App\Http\Controllers\Image\GetImageController;
use App\Http\Controllers\Profile\Home\ViewAchievementsController;
use App\Http\Controllers\Profile\Home\ViewDiaryController;
use App\Http\Controllers\Profile\Home\ViewHomeController;
use App\Http\Controllers\ProfileController;
use App\Models\DiaryRecord;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('image/basic_icon', GetImageController::class)->name('image.basic_icon');

Route::prefix('profile/achievement')->group(function () {
    Route::get('/', ViewAchievementsController::class)->name('achievement.home');
});

Route::prefix('profile/diary')->group(function () {
    Route::get('/', ViewDiaryController::class)->name('diary.home');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('diary')->group(function () {
    Route::prefix('record')->group(function () {
        Route::get('/', [DiaryRecord::class, 'get'])->name('diary-record.get');
        Route::post('/', [DiaryRecord::class, 'add'])->name('diary-record.add');
        Route::put('/{id}', [DiaryRecord::class, 'update'])->name('diary-record.update');
        Route::delete('/{id}', [DiaryRecord::class, 'delete'])->name('diary-record.delete');
    });
    Route::prefix('wish_vape')->group(function () {

    });
});

require __DIR__ . '/auth.php';
