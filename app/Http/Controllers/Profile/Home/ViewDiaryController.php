<?php

namespace App\Http\Controllers\Profile\Home;

use App\Http\Controllers\API\DiaryController;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Render diary page
 */
class ViewDiaryController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke()
    {
        return Inertia::render('Diary/DiaryLayout', ['masks' => DiaryController::getMasks()]);
    }
}
