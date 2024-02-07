<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivation extends Model
{
    public static function checkMainDayMotivation(): bool
    {
        return in_array(User::getDayDontSmoke(), self::getAllMainDaysMotivation());
    }

    public static function getAllMainDaysMotivation(): array
    {
        $jsonData = Json::getContent('motivation/motivation_main_day');

        return array_keys((array)json_decode($jsonData));
    }

    public static function getTextMotivation($key, $isMainDay)
    {
        $jsonData = Json::getContent('motivation/motivation_main_day');

        if ($isMainDay === false) {

            $jsonData = json_decode(Json::getContent('motivation/motivation_lite_text'));
            $key = rand(1, count((array)$jsonData));
        }

        return $jsonData->$key;
    }

}
