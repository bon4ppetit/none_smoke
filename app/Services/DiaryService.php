<?php

namespace App\Services;

use App\Models\Diary;

class DiaryService
{
    public function addDiary($data)
    {
        $data['user_id'] = auth()->user()->id;

        return Diary::create($data);
    }
}