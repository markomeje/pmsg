<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
use Validator;


class NewsController extends Controller
{
    public function index()
    {
        $category = request()->get('category');
        $news = empty($category) ? News::latest('created_at')->paginate(20) : News::latest('created_at')->where(['category' => \Str::title(str_replace('-', ' ', $category))])->paginate(20);
        return view('admin.news.index')->with(['news' => $news]);
    }

    public function add()
    {
        if (request()->ajax() || request()->header('Accept') === 'application/json') {
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

            $status = isset($data['status']) ? (boolean)$data['status'] : false;
            if ($status === true) {
                return response()->json([
                    'status' => 0, 
                    'info' => 'Publish status should be no until after uploading news image.'
                ]);
            }

            $news = News::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'category' => $data['category'],
                'published' => $status,
                'user_id' => auth()->id()
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

    public function status($id = 0)
    {
        $news = News::find($id);
        if (empty($news)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Operation failed'
            ], 500);
        }

        $news->published = (boolean)$news->published === true ? false : true;
        if ($news->update()) {
            return response()->json([
                'status' => 1, 
                'info' => 'Operation Successful',
                'redirect' => ''
            ]);
        }

        return response()->json([
            'status' => 0, 
            'info' => 'Operation failed'
        ], 500);
    }

    public function edit($id = 0)
    {
        $news = News::find($id);
        if (empty($news)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid Operation.'
            ]);
        }

        if (request()->ajax() || request()->header('Accept') === 'application/json') {
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

            $status = isset($data['status']) ? (boolean)$data['status'] : false;
            if ($status === true && empty($news->image->url)) {
                return response()->json([
                    'status' => 0, 
                    'info' => 'Publish status should be no until after uploading news image.'
                ]);
            }

            $news->title = $data['title'];
            $news->description = $data['description'];
            $news->category = $data['category'];
            $news->published = $status;

            if ($news->update()) {
                return response()->json([
                    'status' => 1, 
                    'info' => 'Operation Successful',
                    'redirect' => ''
                ]);
            }

            return response()->json([
                'status' => 0, 
                'info' => 'Operation failed',
            ], 500);
        }

        return view('admin.news.edit')->with(['news' => $news]);
    }

    public function delete($id = 0)
    {
        $news = News::find($id);
        if (empty($news)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid Operation.'
            ], 500);
        }

        if ($news->image()->exists()) {
            if (!empty($news->image->url)) {
                $prevfile = explode('/', $news->image->url);
                $previmage = end($prevfile);
                $file = "images/news/{$previmage}";
                if (file_exists($file)) {
                    unlink($file);
                }

                $news->image()->delete();
            }
        }

        if ($news->delete()) {
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful.',
                'redirect' => ''
            ]);
        }

        return response()->json([
            'status' => 0, 
            'info' => 'Operation failed'
        ]);
    }
}
