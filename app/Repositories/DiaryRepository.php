<?php

namespace App\Repositories;

use App\Models\Diary;
use App\Repositories\Interfaces\DiaryRepositoryInterface;

class DiaryRepository implements DiaryRepositoryInterface
{
    public static function getAllUserMasks()
    {
        $masks = \DB::table('diary')->select(['wish_vape', 'text', 'user_id', 'created_at'])
            ->where('user_id', auth()->user()->id)
            ->orderByDesc('created_at')
            ->get()
            ->toArray();

        foreach ($masks as $key => $mask) {
            $data = strtotime($mask->created_at);
            $masks[$key]->created_at = date('d.m.Y', $data);
        }

        return $masks;
    }
}