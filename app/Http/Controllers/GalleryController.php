<?php

namespace App\Http\Controllers;
use App\Models\Image;

class GalleryController extends Controller
{
    /**
     */
    public function index()
    {
        return view('frontend.gallery.index')->with(['gallery' => Image::latest('created_at')->where(['type' => 'gallery'])->paginate(20)]);
    }

}
