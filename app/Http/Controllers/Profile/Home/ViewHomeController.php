<?php

namespace App\Http\Controllers\Profile\Home;

use App\Http\Controllers\API\DiaryController;
use App\Http\Controllers\Controller;
use App\Models\Diary;
use App\Models\Goal;
use App\Models\User;
use Inertia\Inertia;

class ViewHomeController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Dashboard', [
            'basicInfoSmoke' => User::getBasicInfoSmoke(),
            'lastDiaryRecord' => [
                'lastRecordData' => Diary::getLastRecord(),
                'daysFromAddedRecord' => Diary::getDiffCurrentDateAndLastRecordDate()
            ],
            'goalsUser' => Goal::getGoal(),
        ]);
    }
}
