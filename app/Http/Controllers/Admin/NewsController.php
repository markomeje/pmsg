<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
use Validator;


class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index')->with(['news' => News::paginate(20)]);
    }

    public function add()
    {
        if (request()->ajax() || request()->header('Accept') == 'application/json') {
            $data = request()->all();
            $validator = Validator::make($data, [
                'title' => ['required', 'string'],
                'description' => ['required', 'string'],
                'category' => ['required', 'string'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 0, 
                    'error' => $validator->errors()
                ]);
            }

            $news = News::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'category' => $data['category'],
                'published' => (boolean)$data['status'],
                'user_id' => auth()->user()->id
            ]);

            if ($news) {
                return response()->json([
                    'status' => 1, 
                    'info' => 'Operation successful',
                    'redirect' => route('admin.news.edit', ['id' => $news->id])
                ]);
            }

            return response()->json([
                'status' => 0, 
                'info' => 'Operation successful',
            ], 500);
        }

        return view('admin.news.add')->with(['news' => News::paginate(20)]);
    }

    public function status($id)
    {
        $article = Blog::find($id);
        $article->published = (boolean)$article->published ? false : true;
        $article->update();
        return response()->json([
            'status' => 1, 
            'info' => 'Article status updated successfully'
        ]);
    }

    public function edit($id = 0)
    {
        $news = News::find($id);
        if (request()->ajax() || request()->header('Accept') == 'application/json') {
            $data = request()->all();
            $validator = Validator::make($data, [
                'title' => ['required', 'string'],
                'description' => ['required', 'string'],
                'category' => ['required', 'integer'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 0, 
                    'error' => $validator->errors()
                ]);
            }

            $news->title = $data['title'];
            $news->description = $data['description'];
            $news->category_id = $data['category'];
            $news->published = (boolean)$data['status'];
            $news->update();

            return response()->json([
                'status' => 1, 
                'info' => 'Operation Successful',
                'redirect' => ''
            ]);
        }

        return view('admin.news.edit')->with(['news' => $news]);

    }
}
