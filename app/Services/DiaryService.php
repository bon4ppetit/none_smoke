<?php

namespace App\Services;

use App\Models\Diary;
use Illuminate\Database\QueryException;

class DiaryService
{
    /**
     * Add new task to diary
     *
     * @param $data
     *
     * @return mixed
     */
    public function addDiary($data): mixed
    {
        $data['user_id'] = auth()->user()->id;

        if (!in_array($data['wish_vape'], range(1, 5)))
            return [
                'code' => 'ERR_BAD_REQUEST_NUM_WISH_VAPE',
                'message' => 'Вы не поставили оценку прошедшим дням, пожалуйста, укажите её в форме заполнения'
            ];

        return Diary::create($data);
    }
}