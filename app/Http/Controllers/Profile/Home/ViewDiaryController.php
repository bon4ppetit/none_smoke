<?php

namespace App\Http\Controllers\Profile\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ViewDiaryController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Diary/DiaryLayout');
    }
}
