<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Motivation;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class MotivationController extends Controller
{
    /**
     * Get motivation for user
     *
     * @return JsonResponse
     */
    public function getMotivation()
    {
        return response()->json([
            'isMainDay' => Motivation::checkMainDayMotivation(),
            'day' => User::getDayDontSmoke(),
            'text' => Motivation::getTextMotivation(User::getDayDontSmoke(), Motivation::checkMainDayMotivation()),
        ]);
    }
}
