<?php

namespace App\Http\Controllers\Profile\Home;

use App\Http\Controllers\API\DiaryController;
use App\Http\Controllers\Controller;
use App\Models\DiaryWishVape;
use App\Models\Goal;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Render home page
 */
class ViewHomeController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke()
    {
        return Inertia::render('Dashboard', [
            'basicInfoSmoke' => User::getBasicInfoSmoke(),
            'lastDiaryRecord' => [
                'lastRecordData' => DiaryWishVape::getLastRecord(),
                'daysFromAddedRecord' => DiaryWishVape::getDiffCurrentDateAndLastRecordDate()
            ],
            'goalsUser' => Goal::getGoal(),
        ]);
    }
}
