<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     *  Get image from storage
     * @param $path
     * @return string
     */
    protected function getImage($path): string
    {
        return asset($path);
    }
}
