<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     */
    public function index()
    {
        return view('frontend.news.index')->with(['news' => News::published()->latest('created_at')->paginate(18)]);
    }

    /**
     * Read single news
     */
    public function read($id = 0)
    {
        $info = News::find($id);
        if (empty($info)) {
            return view('frontend.news.read')->with(['info' => '']);
        }

        $title = ucwords($info->title.' | '.config('app.name'));
        return view('frontend.news.read')->with(['title' => $title, 'info' => $info]);
    }
}
