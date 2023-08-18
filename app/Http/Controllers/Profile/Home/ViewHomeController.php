<?php

namespace App\Http\Controllers\Profile\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;

class ViewHomeController extends Controller
{
    function __invoke() {
        return Inertia::render('Dashboard', [
            'basicInfoSmoke' => User::getBasicInfoSmoke()
        ]);
    }
}
