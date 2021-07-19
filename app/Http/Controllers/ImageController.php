<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function a()
    {
        return 5;
    }
    public function productImages($imageable_id)
    {
        return Image::whereImageable_id($imageable_id)->get();
    }
}
