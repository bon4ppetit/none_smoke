<?php

namespace App\Services;

use App\Models\Diary;

class DiaryService
{
    /**
     * Add new task to diary
     *
     * @param $data
     *
     * @return mixed
     */
    public function addDiary($data)
    {
        $data['user_id'] = auth()->user()->id;

        return Diary::create($data);
    }
}