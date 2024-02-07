<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Json extends Model
{
    public static function getContent($fileName)
    {
        return file_get_contents(storage_path("app/data_json/${fileName}.json"), true);
    }
}
