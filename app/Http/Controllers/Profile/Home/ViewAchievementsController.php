<?php

namespace App\Http\Controllers\Profile\Home;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ViewAchievementsController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Achieve/AchieveLayout');
    }
}
