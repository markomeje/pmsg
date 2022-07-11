<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Image;

class GalleryController extends Controller
{
    /**
     * Gallery index.
     */
    public function index()
    {
        return view('admin.gallery.index')->with(['images' => Image::latest('created_at')->where(['type' => 'gallery'])->paginate(20)]);
    }

}
