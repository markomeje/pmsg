<?php

namespace App\Http\Controllers;
use App\Models\{Support, News};

class HomeController extends Controller
{
    /**
     */
    public function index()
    {
        return view('frontend.home.index')->with(['news' => News::published()->latest('created_at')->take(6)->get()]);
    }

    /**
     * The Pricipal profile
     */
    public function profile()
    {
        return view('frontend.home.profile')->with([]);
    }

    /**
     * The support view
     */
    public function support()
    {
        return view('frontend.home.support')->with([]);
    }
}
