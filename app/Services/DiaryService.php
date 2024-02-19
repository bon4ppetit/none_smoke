<?php

namespace App\Services;

use App\Models\DiaryWishVape;
use Carbon\Carbon;

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
        if (DiaryWishVape::getLastRecord()?->created_at->isToday()) {
            return [
                'code' => 'ERR_IS_TODAY',
                'message' => 'Вы сегодня уже добавляли отметку, возвращайтесь завтра чтобы добавить новую'
            ];
        }

        $data['user_id'] = auth()->user()->id;

        if (!in_array($data['wish_vape'], range(1, 5)))
            return [
                'code' => 'ERR_BAD_REQUEST_NUM_WISH_VAPE',
                'message' => 'Вы не поставили оценку прошедшим дням, пожалуйста, укажите её в форме заполнения'
            ];

        return DiaryWishVape::create($data);
    }


}