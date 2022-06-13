<?php

namespace App\Http\Controllers\Admin;
use App\Models\Image;
use App\Http\Controllers\Controller;
use Validator;

class ImagesController extends Controller
{
    /**
     * Upload blog image
     */
    public function upload($id = 0)
    {
        $file = request()->file('image');
        $validator = Validator::make(['image' => $file], [
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg|max:10240']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $data = request()->all();
        $model_id = $data['model_id'] ?? 0;
        $type = $data['type'] ?? '';

        $extension = $file->getClientOriginalExtension();
        $filename = \Str::uuid().'.'.$extension;
        $path = 'images/news';
        $file->move($path, $filename);
        $url = config('app.url')."/{$path}/{$filename}";

        $image = Image::where(['model_id' => $model_id])->first();
        if (empty($image)) {
            $image = Image::create([
                'url' => $url,
                'model_id' => $model_id,
                'filename' => $filename,
                'format' => $extension,
                'type' => $type,
                'user_id' => auth()->id(),
            ]);

            if ($image) {
                return response()->json([
                    'status' => 1, 
                    'info' => 'Operation successful'
                ]);
            }

            return response()->json([
                'status' => 1, 
                'info' => 'Operation failed'
            ], 500);
            
        }

        if (!empty($image->url)) {
            $prevfile = explode('/', $image->url);
            $previmage = end($prevfile);
            $file = "{$path}/{$previmage}";
            if (file_exists($file)) {
                unlink($file);
            }
        }
            
        $image->url = $url;
        $image->format = $extension;
        $image->filename = $filename;
        $image->type = $type;

        if ($image->update()) {
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful'
            ]);
        }

        return response()->json([
            'status' => 0, 
            'info' => 'Operation faled'
        ], 500);

    }

    public function delete($id)
    {
        
    }

}
