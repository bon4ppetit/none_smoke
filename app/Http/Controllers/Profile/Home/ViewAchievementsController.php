<?php

namespace App\Http\Controllers\Profile\Home;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Render achievements page
 */
class ViewAchievementsController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke()
    {
        return Inertia::render('Achieve/AchieveLayout');
    }
}
