<?php

namespace App\Http\Controllers;
use App\Models\Image;

class GalleryController extends Controller
{
    /**
     */
    public function index()
    {
        return view('frontend.gallery.index')->with(['title' => 'Our Gallery | Peter Mbah Support Group', 'gallery' => Image::latest('created_at')->where(['type' => 'gallery'])->paginate(20)]);
    }

}
