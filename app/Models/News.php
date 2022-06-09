<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'published',
        'category',
        'status',
        'description',
        'user_id',
    ];

    /**
     * News Categories
     *
     * @var array
     */
    CONST CATEGORIES = [
        'Politics',
        'Business',
        'PDP',
        'Enugu State',
    ];

    /**
     * Blog published status
     */
    CONST STATUS = [
        'yes' => 1, 
        'no' => 0
    ];

    
    /**
     * A blog may have an image
     */
    public function image()
    {
        return $this->hasOne(Image::class, 'model_id')->where(['type' => 'blog']);
    }
}
