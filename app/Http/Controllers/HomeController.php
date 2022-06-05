<?php

namespace App\Http\Controllers;
use App\Models\Support;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index')->with([]);
    }
}
