<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model for Motivation Logic
 */
class Motivation extends Model
{
    /**
     * Check, day is in list with important day
     *
     * @return bool
     */
    public static function checkMainDayMotivation(): bool
    {
        return in_array(User::getDayDontSmoke(), self::getAllMainDaysMotivation());
    }

    /**
     * Get all the important days that are in the list
     *
     * @return array
     */
    public static function getAllMainDaysMotivation(): array
    {
        $jsonData = Json::getContent('motivation/motivation_main_day');

        return array_keys((array)json_decode($jsonData));
    }

    /**
     * Get text | sentence motivation from lite or important list
     *
     * @param $key
     * @param $isMainDay
     * @return mixed
     */
    public static function getTextMotivation($key, $isMainDay): mixed
    {
        $jsonData = json_decode(Json::getContent('motivation/motivation_main_day'));
        $key = $isMainDay;

        if ($isMainDay === false) {

            $jsonData = json_decode(Json::getContent('motivation/motivation_lite_text'));
            $key = rand(1, count((array)$jsonData));
        }

        return $jsonData->data->$key;
    }
}
