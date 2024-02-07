<?php

use App\Http\Controllers\API\MotivationController;
use App\Http\Controllers\API\ProgressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GoalController;
use App\Http\Controllers\API\DiaryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('progress')->group(function () {
    Route::delete('/', [ProgressController::class, 'destroy'])->name('progress.destroy');
    Route::post('/', [ProgressController::class, 'storeSmokeProgress'])->name('profile.statistic.store');
});

Route::prefix('profile')->group(function () {
    Route::post('goal/destroy', [GoalController::class, 'destroy'])->name('goal.destroy');
    Route::post('goal', [GoalController::class, 'add'])->name('goal.add');
    Route::get('motivation', [MotivationController::class, 'checkUserMotivation']);
});

Route::prefix('diary')->group(function () {
    Route::post('/', [DiaryController::class, 'add'])->name('api.diary.add');
    Route::get('/', [DiaryController::class, 'getMasks'])->name('api.diary.get');
});


