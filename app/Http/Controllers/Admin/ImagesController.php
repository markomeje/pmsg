<?php

namespace App\Http\Controllers\Admin;
use App\Models\Image;
use App\Http\Controllers\Controller;
use Validator;
use Exception;

class ImagesController extends Controller
{
    /**
     * Upload blog image
     */
    public function upload()
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
        $path = 'images/gallery';
        $file->move($path, $filename);
        $url = config('app.url')."/{$path}/{$filename}";

        $image = $type === 'gallery' ? Image::find(request()->get('id')) : Image::where(['model_id' => $model_id])->first();
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

    /**
     * Delete images
     */
    public function delete($id = 0)
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'id' => ['required'],
            'type' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'info' => 'Validation failed.',
                'error' => $validator->errors()
            ]);
        }

        try {
            $image = Image::where([
                'type' => $data['type'], 
                'id' => $data['id'], 
            ])->get()->first();

            if (empty($image)) {
                return response()->json([
                    'status' => 0, 
                    'info' => 'Image not found.'
                ], 500);
            }

            $path = 'images/gallery';
            if (!empty($image->url)) {
                $prevfile = explode('/', $image->url);
                $previmage = end($prevfile);
                $file = "{$path}/{$previmage}";
                if (file_exists($file)) {
                    unlink($file);
                }

                $image->delete();
                return response()->json([
                    'status' => 1, 
                    'info' => 'Operation successful',
                    'redirect' => '',
                ]);
            }

            return response()->json([
                'status' => 0, 
                'info' => 'Operation failed',
                'redirect' => '',
            ]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 0, 
                'info' => 'Unknown error. Try again.'
            ]);
        }     
    }

    /**
     * Upload multiple images with filepond
     */
    public function multiple()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'images' => ['required'],
            'model_id' => ['nullable', 'integer'],
            'type' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid Operation.',
                'error' => $validator->errors()
            ], 500);
        }

        $files = request()->file('images');
        if(!is_array($files) || count($files) <= 0){
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid files sent.'
            ], 500);
        }

        try {
            $images = [];
            foreach($files as $file){
                $extension = $file->getClientOriginalExtension();
                $filename = \Str::uuid().'.'.$extension;
                $path = 'images/gallery';
                $filePath = "/{$path}/{$filename}";

                $image = Image::create([
                    'url' => config('app.url').$filePath,
                    'model_id' => $data['model_id'] ?? 0,
                    'filename' => $filename,
                    'format' => $extension,
                    'type' => $data['type'],
                    'user_id' => auth()->id(),
                ]);

                if ($image) {
                    $file->move($path, $filename);
                    $images[] = $image;
                }
            }

            return empty($images) ? response()->json([
                'status' => 0, 
                'info' => 'Image upload failed',
                'images' => $images,
            ], 500) :  response()->json([
                'status' => 1, 
                'info' => 'Image upload successful',
                'images' => $images,
            ]);
        } catch (Exception $exception) {
            response()->json([
                'status' => 0, 
                'info' => 'Image upload failed',
            ], 500);
        }
            
    }

}
