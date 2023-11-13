<?php

namespace App\Http\Controllers\Profile\Home;

use App\Http\Controllers\API\DiaryController;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ViewDiaryController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Diary/DiaryLayout', [
            'masks' => DiaryController::getMasks(),
        ]);
    }
}
