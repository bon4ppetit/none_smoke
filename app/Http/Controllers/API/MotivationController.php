<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Motivation;
use App\Models\User;

class MotivationController extends Controller
{
    public function checkUserMotivation()
    {
        return response()->json([
            'isMainDay' => Motivation::checkMainDayMotivation(),
            'day' => User::getDayDontSmoke(),
            'text' => Motivation::getTextMotivation(User::getDayDontSmoke(), Motivation::checkMainDayMotivation()),
        ]);
    }
}
