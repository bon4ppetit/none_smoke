<?php

namespace App\Repositories;

use App\Models\Diary;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\DiaryRepositoryInterface;

class DiaryRepository implements DiaryRepositoryInterface
{
    public static function getAllUserMasks(): \Illuminate\Support\Collection
    {
        $masks = DB::table('diary_wish_vape')->select(['id', 'wish_vape', 'text', 'user_id', 'created_at'])
            ->where('user_id', auth()->user()->id)
            ->orderByDesc('created_at')
            ->get();

        $wishVapeStatusTextList = [
            1 => 'Не получилось сдержаться',
            2 => 'Было тяжело и мучительно, но сдержался',
            3 => 'Сдержался, но много думал об этом',
            4 => 'Сдержался, было пару мыслей',
            5 => 'Сдержался на легке',
        ];

        foreach ($masks as $key => $mask) {
            $data = strtotime($mask->created_at);
            $masks[$key]->created_at = date('d.m.Y', $data);
            $masks[$key]->wish_vape = [
                'status' => $mask->wish_vape,
                'wishVapeText' => $wishVapeStatusTextList[$mask->wish_vape]
            ];
        }

        return $masks;
    }
}