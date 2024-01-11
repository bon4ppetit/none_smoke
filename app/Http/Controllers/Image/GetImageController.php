<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetImageRequest;
use App\Models\Image;


/**
 *  Get image from storage
 */
class GetImageController extends Controller
{
    /**
     * @param GetImageRequest $request
     * @return string
     */
    public function __invoke(GetImageRequest $request)
    {
        return Image::getImage($request->validated('path'));
    }
}
