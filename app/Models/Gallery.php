<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    /**
     * Seting gallery table
     */
    protected $table = 'gallery';

    /**
     * Gallery has many images
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'model_id')->where(['type' => 'property']);
    }
}
