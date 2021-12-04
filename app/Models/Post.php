<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = ['user_id', 'title', 'content', 'img_url', 'product_category_id'];

    protected $appends = ['rating_point'];

    public function getRatingPointAttribute()
    {
        $reviews = $this->reviews;
        $count = $reviews->count();
        if ($count == 0) {
            return 0;
        }
        $point = $reviews->sum('rating') / $count;
        return $point;
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'post_id', 'id');
    }
}
