<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Json extends Model
{
    /**
     * Get text content from Json file
     *
     * @param $fileName
     * @return false|string
     */
    public static function getContent($fileName): bool|string
    {
        return file_get_contents(storage_path("app/data_json/${fileName}.json"), true);
    }
}
