<?php

namespace App\Http\Controllers\Admin;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     */
    public function index()
    {
        return view('admin.gallery.index')->with(['images' => News::published()->latest('created_at')->take(6)->get()]);
    }

}
